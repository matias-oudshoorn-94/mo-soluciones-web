<?php
/** @var list<\App\Models\Service> $services */
use App\Core\View;
?>
<section class="page-hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container">
        <span class="eyebrow">Servicios</span>
        <h1>Soluciones web <span class="gradient-text">a tu medida</span></h1>
        <p class="lead">Elegí el servicio que necesitás o combinemos varios. Cada proyecto incluye diseño responsive, optimización de velocidad y SEO básico.</p>
    </div>
</section>

<section class="section">
    <div class="container services-list">
        <?php foreach ($services as $i => $service): ?>
            <article class="service-row reveal" id="<?= e($service->slug) ?>">
                <div class="service-intro">
                    <span class="card-icon card-icon-lg"><?= icon($service->icon) ?></span>
                    <span class="service-num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                </div>
                <div class="service-text">
                    <h2><?= e($service->title) ?></h2>
                    <p class="lead-sm"><?= e($service->summary) ?></p>
                    <p><?= e($service->description) ?></p>
                    <a href="<?= url('/contacto?servicio=' . $service->slug) ?>" class="link-arrow">Consultar por este servicio <?= icon('arrow') ?></a>
                </div>
                <ul class="check-list">
                    <?php foreach ($service->features as $feature): ?>
                        <li><?= icon('check') ?> <?= e($feature) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?= View::partial('cta', [
    'title' => '¿No sabés qué servicio necesitás?',
    'text'  => 'Contame tu situación y te recomiendo la mejor opción para tu negocio y tu presupuesto.',
]) ?>
