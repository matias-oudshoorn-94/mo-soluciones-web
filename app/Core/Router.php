<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\ErrorController;

/**
 * Router simple con soporte para parámetros: /portfolio/{slug}
 */
final class Router
{
    /** @var array<string, array<string, array{0: class-string, 1: string}>> */
    private array $routes = ['GET' => [], 'POST' => []];

    public function get(string $path, array $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post(string $path, array $action): void
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = $this->normalize($uri);
        App::setCurrentPath($path);

        $method = strtoupper($method);
        if ($method === 'HEAD') {
            $method = 'GET';
        }

        foreach ($this->routes[$method] ?? [] as $route => $action) {
            $params = $this->match($route, $path);
            if ($params !== null) {
                [$class, $handler] = $action;
                (new $class())->$handler(...$params);
                return;
            }
        }

        // ¿La ruta existe con otro método? -> 405. Si no -> 404.
        $otherMethod = $method === 'GET' ? 'POST' : 'GET';
        foreach (array_keys($this->routes[$otherMethod]) as $route) {
            if ($this->match($route, $path) !== null) {
                http_response_code(405);
                header('Allow: ' . $otherMethod);
                (new ErrorController())->notFound();
                return;
            }
        }

        (new ErrorController())->notFound();
    }

    /** Devuelve los parámetros si la ruta coincide, o null si no. */
    private function match(string $route, string $path): ?array
    {
        $pattern = preg_replace('#\{([a-z_]+)\}#', '(?P<$1>[a-z0-9\-]+)', $route);
        if (!preg_match('#^' . $pattern . '$#', $path, $matches)) {
            return null;
        }
        return array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
    }

    private function normalize(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $base = App::basePath();

        if ($base !== '' && str_starts_with($path, $base)) {
            $path = substr($path, strlen($base));
        }
        if (str_starts_with($path, '/index.php')) {
            $path = substr($path, strlen('/index.php'));
        }

        $path = '/' . trim(rawurldecode($path), '/');
        return strtolower($path);
    }
}
