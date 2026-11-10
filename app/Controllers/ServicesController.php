<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Service;

final class ServicesController extends Controller
{
    public function index(): void
    {
        $this->view('services', ['services' => Service::all()], [
            'title'       => 'Servicios',
            'description' => 'Sitios institucionales, tiendas online, sistemas de gestión, SEO, landing pages y mantenimiento web.',
        ]);
    }
}
