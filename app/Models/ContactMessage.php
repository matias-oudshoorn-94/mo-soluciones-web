<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Mensaje enviado desde el formulario de contacto.
 * Se valida, se guarda en storage/messages y se envía por email.
 */
final class ContactMessage
{
    public const array SERVICES = [
        'institucionales' => 'Sitio institucional',
        'ecommerce'     => 'Tienda online',
        'sistemas'      => 'Sistema de gestión',
        'seo'           => 'SEO / Posicionamiento',
        'landing'       => 'Landing page',
        'hosting'       => 'Hosting, dominio y mantenimiento',
        'otro'          => 'Otro',
    ];

    /** @var array<string, string> */
    private array $errors = [];

    private function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $company,
        public readonly string $service,
        public readonly string $message,
    ) {}

    public static function fromArray(array $input): self
    {
        $clean = static fn (string $key, int $max): string =>
            text_limit(trim(strip_tags((string) ($input[$key] ?? ''))), $max);

        return new self(
            name:    $clean('name', 100),
            email:   $clean('email', 150),
            phone:   $clean('phone', 40),
            company: $clean('company', 100),
            service: $clean('service', 30),
            message: $clean('message', 3000),
        );
    }

    public function validate(): bool
    {
        $this->errors = [];

        if (text_length($this->name) < 2) {
            $this->errors['name'] = 'Ingresá tu nombre.';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Ingresá un email válido.';
        }
        if ($this->phone !== '' && !preg_match('/^[0-9+()\s\-]{6,40}$/', $this->phone)) {
            $this->errors['phone'] = 'El teléfono no parece válido.';
        }
        if (!array_key_exists($this->service, self::SERVICES)) {
            $this->errors['service'] = 'Elegí un servicio.';
        }
        if (text_length($this->message) < 10) {
            $this->errors['message'] = 'Contanos un poco más sobre tu proyecto (mínimo 10 caracteres).';
        }

        return $this->errors === [];
    }

    /** @return array<string, string> */
    public function errors(): array
    {
        return $this->errors;
    }

    public function toArray(): array
    {
        return [
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone,
            'company' => $this->company,
            'service' => $this->service,
            'message' => $this->message,
        ];
    }

    /** Guarda una copia en disco, así no se pierde nada aunque falle el email. */
    public function store(): bool
    {
        $dir = BASE_PATH . '/storage/messages';
        if (!is_dir($dir) && !mkdir($dir, 0750, true)) {
            return false;
        }

        $data = [
            ...$this->toArray(),
            'service_label' => self::SERVICES[$this->service] ?? $this->service,
            'ip'            => $_SERVER['REMOTE_ADDR'] ?? '',
            'created_at'    => date('c'),
        ];

        $file = $dir . '/' . date('Ymd-His') . '-' . bin2hex(random_bytes(4)) . '.json';
        return file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) !== false;
    }

    /** Envía el mensaje por email con mail(). Devuelve false si el servidor no pudo enviarlo. */
    public function send(): bool
    {
        $to = (string) config('mail.to');
        $from = (string) config('mail.from');
        if ($to === '') {
            return false;
        }

        $subject = '=?UTF-8?B?' . base64_encode(config('mail.subject') . ' - ' . $this->name) . '?=';
        $body = implode("\n", [
            'Nombre:   ' . $this->name,
            'Email:    ' . $this->email,
            'Teléfono: ' . ($this->phone ?: '-'),
            'Empresa:  ' . ($this->company ?: '-'),
            'Servicio: ' . (self::SERVICES[$this->service] ?? $this->service),
            '',
            'Mensaje:',
            $this->message,
        ]);

        // El email del visitante ya fue validado, así que es seguro como Reply-To.
        $headers = [
            'From'         => $from,
            'Reply-To'     => $this->email,
            'Content-Type' => 'text/plain; charset=UTF-8',
            'X-Mailer'     => 'PHP/' . PHP_VERSION,
        ];

        return @mail($to, $subject, $body, $headers);
    }
}
