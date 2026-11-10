<?php

declare(strict_types=1);

use App\Core\App;

/** Escapa texto para imprimirlo en HTML. */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Lee un valor de configuración con notación de puntos: config('contact.email'). */
function config(string $key, mixed $default = null): mixed
{
    return App::config($key, $default);
}

/** URL relativa a la raíz del sitio (funciona también dentro de una subcarpeta). */
function url(string $path = '/'): string
{
    return App::basePath() . '/' . ltrim($path, '/');
}

/** URL a un archivo dentro de public/assets, con versión para evitar caché vieja. */
function asset(string $path): string
{
    $file = BASE_PATH . '/public/assets/' . ltrim($path, '/');
    $version = is_file($file) ? (string) filemtime($file) : '1';
    return url('assets/' . ltrim($path, '/')) . '?v=' . $version;
}

/** Devuelve true si la ruta actual coincide con $path (para marcar el menú activo). */
function is_active(string $path): bool
{
    $current = App::currentPath();
    return $path === '/' ? $current === '/' : str_starts_with($current, $path);
}

/** Link de WhatsApp con mensaje opcional. */
function whatsapp_link(string $message = ''): string
{
    $link = 'https://wa.me/' . config('contact.whatsapp');
    return $message !== '' ? $link . '?text=' . rawurlencode($message) : $link;
}

/** Ícono SVG inline desde app/Views/partials/icons.php */
function icon(string $name, string $class = 'icon'): string
{
    static $icons = null;
    $icons ??= require BASE_PATH . '/app/Views/partials/icons.php';
    $paths = $icons[$name] ?? '';
    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
        . 'stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . $paths . '</svg>';
}

/** Largo de un texto UTF-8 (no depende de la extensión mbstring). */
function text_length(string $text): int
{
    return function_exists('mb_strlen') ? mb_strlen($text) : (int) preg_match_all('/./us', $text);
}

/** Recorta un texto UTF-8 a $max caracteres sin cortar letras a la mitad. */
function text_limit(string $text, int $max): string
{
    if (function_exists('mb_substr')) {
        return mb_substr($text, 0, $max);
    }
    preg_match('/^.{0,' . $max . '}/us', $text, $m);
    return $m[0] ?? '';
}
