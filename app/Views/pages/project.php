<?php
/**
 * @var \App\Models\Project $project
 * @var list<\App\Models\Project> $related
 */
use App\Core\View;
?>
<section class="page-hero page-hero-sm">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container">
        <nav class="breadcrumb" aria-label="Ruta">
            <a href="<?= url('/portfolio') ?>">Portfolio</a> <span>/</span> <span><?= e($project->client) ?></span>
        </nav>
        <span class="tag"><?= e($project->category->label()) ?></span>
        <h1><?= e($project->title) ?></h1>
        <p class="lead"><?= e($project->summary) ?></p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="project-hero-preview reveal">
            <?= View::partial('project-preview', ['project' => $project]) ?>
        </div>

        <div class="project-detail">
            <div class="project-content">
                <div class="reveal">
                    <h2>El desafío</h2>
                    <p><?= e($project->challenge) ?></p>
                </div>
                <div class="reveal">
                    <h2>La solución</h2>
                    <p><?= e($project->solution) ?></p>
                </div>
                <div class="reveal">
                    <h2>Resultados</h2>
                    <ul class="results">
                        <?php foreach ($project->results as $result): ?>
                            <li><?= icon('check') ?> <?= e($result) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <aside class="project-meta reveal">
                <dl>
                    <div><dt>Cliente</dt><dd><?= e($project->client) ?></dd></div>
                    <div><dt>Tipo</dt><dd><?= e($project->category->label()) ?></dd></div>
                    <div><dt>Año</dt><dd><?= $project->year ?></dd></div>
                    <div>
                        <dt>Tecnologías</dt>
                        <dd class="chips">
                            <?php foreach ($project->stack as $tech): ?><span class="chip"><?= e($tech) ?></span><?php endforeach; ?>
                        </dd>
                    </div>
                </dl>
                <?php if ($project->url !== ''): ?>
                    <a href="<?= e($project->url) ?>" class="btn btn-ghost btn-block" target="_blank" rel="noopener">Visitar sitio <?= icon('external') ?></a>
                <?php endif; ?>
                <a href="<?= url('/contacto') ?>" class="btn btn-primary btn-block">Quiero algo así</a>
            </aside>
        </div>
    </div>
</section>

<?php if ($related): ?>
<section class="section section-alt">
    <div class="container">
        <div class="section-head reveal">
            <h2>Otros proyectos</h2>
        </div>
        <div class="grid grid-2">
            <?php foreach ($related as $item): ?>
                <?= View::partial('project-card', ['project' => $item]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
