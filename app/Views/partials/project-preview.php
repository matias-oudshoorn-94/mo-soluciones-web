<?php
/**
 * Vista previa del proyecto: la captura si existe, o una ilustración tipo navegador.
 * @var \App\Models\Project $project
 */
$hasImage = $project->image !== '' && is_file(BASE_PATH . '/public/assets/img/portfolio/' . $project->image);
?>
<div class="preview" style="--accent: <?= e($project->accent) ?>">
    <div class="preview-bar"><i></i><i></i><i></i><span><?= e($project->client) ?></span></div>
    <?php if ($hasImage): ?>
        <img src="<?= asset('img/portfolio/' . $project->image) ?>" alt="<?= e($project->title) ?>" loading="lazy">
    <?php else: ?>
        <div class="preview-mock preview-<?= e($project->category->value) ?>" aria-hidden="true">
            <div class="pm-nav"><b></b><span></span><span></span><span></span></div>
            <div class="pm-hero"><b></b><span></span><span class="pm-btn"></span></div>
            <div class="pm-grid"><span></span><span></span><span></span></div>
        </div>
    <?php endif; ?>
</div>
