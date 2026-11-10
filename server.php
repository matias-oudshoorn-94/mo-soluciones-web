<?php

/*
 * Router para el servidor embebido de PHP (solo desarrollo):
 *   php -S localhost:8000 -t public server.php
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path !== '/' && is_file(__DIR__ . '/public' . $path)) {
    return false;
}
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/public/index.php';
