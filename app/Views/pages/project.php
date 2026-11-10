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
        <a href="<?= e($project->url) ?>" class="project-hero-preview reveal" target="_blank" rel="noopener" aria-label="Visitar <?= e($project->host()) ?>">
            <?= View::partial('project-preview', ['project' => $project, 'eager' => true]) ?>
        </a>

        <div class="project-detail">
            <div class="project-content">
                <div class="reveal">
                    <h2>Sobre el proyecto</h2>
                    <p><?= e($project->description) ?></p>
                </div>
                <div class="reveal">
                    <h2>Qué incluye</h2>
                    <ul class="results">
                        <?php foreach ($project->features as $feature): ?>
                            <li><?= icon('check') ?> <?= e($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <aside class="project-meta reveal">
                <?php if ($project->logo !== ''): ?>
                    <div class="client-logo client-logo-lg" style="--logo-bg: <?= e($project->logoBg) ?>">
                        <img src="<?= asset('img/clients/' . $project->logo) ?>" alt="<?= e($project->client) ?>">
                    </div>
                <?php endif; ?>
                <dl>
                    <div><dt>Cliente</dt><dd><?= e($project->client) ?></dd></div>
                    <div><dt>Tipo</dt><dd><?= e($project->category->label()) ?></dd></div>
                    <div><dt>Sitio</dt><dd><a href="<?= e($project->url) ?>" target="_blank" rel="noopener" class="meta-link"><?= e($project->host()) ?></a></dd></div>
                    <?php if ($project->stack): ?>
                        <div>
                            <dt>Tecnologías</dt>
                            <dd class="chips">
                                <?php foreach ($project->stack as $tech): ?><span class="chip"><?= e($tech) ?></span><?php endforeach; ?>
                            </dd>
                        </div>
                    <?php endif; ?>
                </dl>
                <a href="<?= e($project->url) ?>" class="btn btn-ghost btn-block" target="_blank" rel="noopener">Visitar sitio <?= icon('external') ?></a>
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
