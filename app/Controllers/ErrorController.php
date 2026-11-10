<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class ErrorController extends Controller
{
    public function notFound(): void
    {
        $status = http_response_code() === 405 ? 405 : 404;
        $this->view('404', [], ['title' => 'Página no encontrada'], $status);
    }
}
