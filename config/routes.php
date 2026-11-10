<?php

declare(strict_types=1);

use App\Controllers\AboutController;
use App\Controllers\ContactController;
use App\Controllers\HomeController;
use App\Controllers\PortfolioController;
use App\Controllers\ServicesController;
use App\Core\Router;

$router = new Router();

$router->get('/',                  [HomeController::class, 'index']);
$router->get('/servicios',         [ServicesController::class, 'index']);
$router->get('/portfolio',         [PortfolioController::class, 'index']);
$router->get('/portfolio/{slug}',  [PortfolioController::class, 'show']);
$router->get('/nosotros',          [AboutController::class, 'index']);
$router->get('/contacto',          [ContactController::class, 'index']);
$router->post('/contacto',         [ContactController::class, 'send']);
$router->get('/contacto/gracias',  [ContactController::class, 'thanks']);

return $router;
