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
                <h2><?= e($title ?? '¿Tenés un proyecto en mente?') ?></h2>
                <p><?= e($text ?? 'Contame qué necesitás y te envío una propuesta sin compromiso en menos de 24 horas hábiles.') ?></p>
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
