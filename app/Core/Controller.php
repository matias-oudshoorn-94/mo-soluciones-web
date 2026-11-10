<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Controlador base: renderizar vistas y redirigir.
 */
abstract class Controller
{
    /**
     * @param array{title?: string, description?: string} $meta
     */
    protected function view(string $view, array $data = [], array $meta = [], int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: text/html; charset=UTF-8');

        $siteName = (string) config('app.name');
        $data['meta'] = [
            'title'       => isset($meta['title']) ? $meta['title'] . ' | ' . $siteName : $siteName . ' | Desarrollo web a medida',
            'description' => $meta['description'] ?? 'Desarrollo de sitios institucionales, tiendas online, sistemas de gestión y SEO. Soluciones web a medida para hacer crecer tu negocio.',
            'canonical'   => rtrim((string) config('app.url'), '/') . App::currentPath(),
        ];

        echo View::render($view, $data);
    }

    protected function redirect(string $path, int $status = 303): never
    {
        header('Location: ' . url($path), true, $status);
        exit;
    }
}
