<?php

declare(strict_types=1);

/*
 * Front controller: todas las peticiones entran por acá.
 */

define('BASE_PATH', dirname(__DIR__));

// Autoload PSR-4 simple para el namespace App\
spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }
    $file = BASE_PATH . '/app/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    if (is_file($file)) {
        require $file;
    }
});

require BASE_PATH . '/app/helpers.php';

use App\Core\App;

App::boot(require BASE_PATH . '/config/config.php');

$router = require BASE_PATH . '/config/routes.php';
$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/');
