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
            'title'       => isset($meta['title']) ? $meta['title'] . ' | ' . $siteName : $siteName . ' | Tu web lista en días, nos encargamos de todo',
            'description' => $meta['description'] ?? 'Sitios web, tiendas online y sistemas de gestión llave en mano. Presupuesto en 24 h, entrega en días y nos encargamos del dominio, hosting, emails y mantenimiento.',
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
