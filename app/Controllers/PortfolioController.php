<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Project;

final class PortfolioController extends Controller
{
    public function index(): void
    {
        $this->view('portfolio', [
            'projects'   => Project::all(),
            'categories' => Project::categories(),
        ], [
            'title'       => 'Portfolio',
            'description' => 'Proyectos de desarrollo web, e-commerce, sistemas de gestión y SEO realizados por Mo Soluciones Web.',
        ]);
    }

    public function show(string $slug): void
    {
        $project = Project::findBySlug($slug);
        if ($project === null) {
            (new ErrorController())->notFound();
            return;
        }

        $this->view('project', [
            'project' => $project,
            'related' => $project->related(2),
        ], [
            'title'       => $project->title,
            'description' => $project->summary,
        ]);
    }
}
