<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class AboutController extends Controller
{
    public function index(): void
    {
        $this->view('about', [], [
            'title'       => 'Nosotros',
            'description' => 'Conocé cómo trabaja Mo Soluciones Web: desarrollo web a medida, comunicación directa y foco en resultados.',
        ]);
    }
}
