<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Estado global mínimo de la aplicación: configuración y rutas base.
 */
final class App
{
    private static array $config = [];
    private static string $basePath = '';
    private static string $currentPath = '/';

    public static function boot(array $config): void
    {
        self::$config = $config;

        date_default_timezone_set($config['app']['timezone'] ?? 'UTC');

        $debug = (bool) ($config['app']['debug'] ?? false);
        ini_set('display_errors', $debug ? '1' : '0');
        error_reporting(E_ALL);

        // Si el sitio vive en una subcarpeta (ej: localhost/mo/public), la detectamos.
        $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
        $base = rtrim($scriptDir, '/');

        // Si el .htaccess de la raíz reenvía a /public, la URL visible no incluye "/public".
        $uriPath = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        if (str_ends_with($base, '/public') && !str_starts_with($uriPath, $base)) {
            $base = substr($base, 0, -strlen('/public'));
        }
        self::$basePath = $base;

        Session::start();
        self::sendSecurityHeaders();
    }

    public static function config(string $key, mixed $default = null): mixed
    {
        $value = self::$config;
        foreach (explode('.', $key) as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }
        return $value;
    }

    public static function basePath(): string
    {
        return self::$basePath;
    }

    public static function currentPath(): string
    {
        return self::$currentPath;
    }

    public static function setCurrentPath(string $path): void
    {
        self::$currentPath = $path;
    }

    private static function sendSecurityHeaders(): void
    {
        if (headers_sent()) {
            return;
        }
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
    }
}
