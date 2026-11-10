<?php
/**
 * Bloque de llamado a la acción reutilizable.
 * @var string|null $title
 * @var string|null $text
 */
?>
<section class="section">
    <div class="container">
        <div class="cta reveal">
            <div>
                <h2><?= e($title ?? '¿Arrancamos? Tu presupuesto en 24 horas') ?></h2>
                <p><?= e($text ?? 'Contanos qué necesitás y te pasamos una propuesta sin compromiso. Del dominio al hosting, nos encargamos de todo.') ?></p>
            </div>
            <div class="cta-actions">
                <a href="<?= url('/contacto') ?>" class="btn btn-light">Pedí tu presupuesto <?= icon('arrow') ?></a>
                <a href="<?= e(whatsapp_link('Hola! Quiero consultar por un proyecto web.')) ?>" class="btn btn-outline-light" target="_blank" rel="noopener">
                    <?= icon('whatsapp') ?> WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
