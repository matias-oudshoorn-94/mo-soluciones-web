<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Project;
use App\Models\Service;

final class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home', [
            'services' => Service::featured(4),
            'projects' => Project::latest(3),
        ]);
    }
}
