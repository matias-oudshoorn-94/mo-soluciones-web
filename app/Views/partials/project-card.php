<?php
/**
 * Tarjeta de proyecto del portfolio.
 * @var \App\Models\Project $project
 */
use App\Core\View;
?>
<article class="project-card reveal" data-category="<?= e($project->category->value) ?>">
    <a href="<?= url('/portfolio/' . $project->slug) ?>" class="project-link">
        <?= View::partial('project-preview', ['project' => $project]) ?>
        <div class="project-body">
            <span class="tag"><?= e($project->category->label()) ?></span>
            <h3><?= e($project->title) ?></h3>
            <p><?= e($project->summary) ?></p>
            <span class="link-arrow">Ver proyecto <?= icon('arrow') ?></span>
        </div>
    </a>
</article>
