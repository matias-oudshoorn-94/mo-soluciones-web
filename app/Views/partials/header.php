<?php
$links = [
    '/'          => 'Inicio',
    '/servicios' => 'Servicios',
    '/portfolio' => 'Portfolio',
    '/nosotros'  => 'Nosotros',
];
?>
<header class="site-header" data-header>
    <div class="container header-inner">
        <a href="<?= url('/') ?>" class="brand" aria-label="<?= e(config('app.name')) ?> — Inicio">
            <img src="<?= asset('img/logo.png') ?>" alt="<?= e(config('app.name')) ?>" width="640" height="105">
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
            <span class="sr-only">Abrir menú</span>
            <?= icon('menu', 'icon icon-open') ?>
            <?= icon('close', 'icon icon-close') ?>
        </button>

        <nav class="site-nav" id="site-nav" aria-label="Principal" data-nav>
            <ul>
                <?php foreach ($links as $path => $label): ?>
                    <li>
                        <a href="<?= url($path) ?>" <?= is_active($path) ? 'aria-current="page"' : '' ?>><?= e($label) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="<?= url('/contacto') ?>" class="btn btn-primary btn-sm">Pedí tu presupuesto</a>
        </nav>
    </div>
</header>
