<?php

declare(strict_types=1);

namespace App\Core;

use RuntimeException;

/**
 * Renderiza una vista dentro de un layout.
 * Las vistas son archivos PHP en app/Views.
 */
final class View
{
    public static function render(string $view, array $data = [], string $layout = 'main'): string
    {
        $content = self::capture('pages/' . $view, $data);
        return self::capture('layouts/' . $layout, [...$data, 'content' => $content]);
    }

    /** Renderiza un parcial (header, footer, tarjetas…). */
    public static function partial(string $name, array $data = []): string
    {
        return self::capture('partials/' . $name, $data);
    }

    private static function capture(string $template, array $data): string
    {
        $file = BASE_PATH . '/app/Views/' . $template . '.php';
        if (!is_file($file)) {
            throw new RuntimeException("Vista no encontrada: {$template}");
        }

        extract($data, EXTR_SKIP);
        ob_start();
        try {
            require $file;
        } catch (\Throwable $e) {
            ob_end_clean();
            throw $e;
        }
        return (string) ob_get_clean();
    }
}
