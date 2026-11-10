<?php /** @var string $name */ ?>
<section class="page-hero page-center">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container narrow">
        <span class="card-icon card-icon-lg success-icon"><?= icon('check') ?></span>
        <h1>¡Gracias<?= $name !== '' ? ', ' . e($name) : '' ?>!</h1>
        <p class="lead">Recibimos tu mensaje. En menos de 24 horas hábiles te enviamos tu presupuesto. Si es urgente, escribinos por WhatsApp.</p>
        <div class="hero-actions center-actions">
            <a href="<?= url('/') ?>" class="btn btn-ghost">Volver al inicio</a>
            <a href="<?= e(whatsapp_link('Hola! Te acabo de enviar una consulta desde la web.')) ?>" class="btn btn-primary" target="_blank" rel="noopener"><?= icon('whatsapp') ?> WhatsApp</a>
        </div>
    </div>
</section>
