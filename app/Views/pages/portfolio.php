<?php
/**
 * @var list<\App\Models\Project> $projects
 * @var list<\App\Models\Category> $categories
 */
use App\Core\View;
?>
<section class="page-hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container">
        <span class="eyebrow">Portfolio</span>
        <h1>Proyectos que <span class="gradient-text">generan resultados</span></h1>
        <p class="lead">Una selección de sitios, tiendas y sistemas desarrollados para clientes de distintos rubros.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="filters" role="group" aria-label="Filtrar proyectos" data-filters>
            <button type="button" class="filter is-active" data-filter="all" aria-pressed="true">Todos</button>
            <?php foreach ($categories as $category): ?>
                <button type="button" class="filter" data-filter="<?= e($category->value) ?>" aria-pressed="false"><?= e($category->label()) ?></button>
            <?php endforeach; ?>
        </div>

        <div class="grid grid-3" data-projects>
            <?php foreach ($projects as $project): ?>
                <?= View::partial('project-card', ['project' => $project]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= View::partial('cta', ['title' => '¿Querés que tu proyecto sea el próximo?']) ?>
