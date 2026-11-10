<?php
/**
 * Vista previa del proyecto: la captura si existe, o una ilustración tipo navegador.
 * @var \App\Models\Project $project
 * @var bool|null $eager  true para la imagen principal (sin lazy loading)
 */
$hasImage = $project->image !== '' && is_file(BASE_PATH . '/public/assets/img/portfolio/' . $project->image);
?>
<div class="preview" style="--accent: <?= e($project->accent) ?>">
    <div class="preview-bar"><i></i><i></i><i></i><span><?= e($project->host() ?: $project->client) ?></span></div>
    <?php if ($hasImage): ?>
        <img src="<?= asset('img/portfolio/' . $project->image) ?>" alt="Captura del sitio de <?= e($project->client) ?>"
             width="1200" height="750" <?= empty($eager) ? 'loading="lazy"' : 'fetchpriority="high"' ?>>
    <?php else: ?>
        <div class="preview-mock preview-<?= e($project->category->value) ?>" aria-hidden="true">
            <div class="pm-nav"><b></b><span></span><span></span><span></span></div>
            <div class="pm-hero"><b></b><span></span><span class="pm-btn"></span></div>
            <div class="pm-grid"><span></span><span></span><span></span></div>
        </div>
    <?php endif; ?>
</div>
