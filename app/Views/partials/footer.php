<?php use App\Models\Service; ?>
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <a href="<?= url('/') ?>" class="brand">
                <img src="<?= asset('img/logo.png') ?>" alt="<?= e(config('app.name')) ?>" width="640" height="105" loading="lazy">
            </a>
            <p>Desarrollo web a medida para empresas y emprendedores que quieren crecer en digital.</p>
            <ul class="social">
                <?php foreach (config('social', []) as $network => $link): ?>
                    <li>
                        <a href="<?= e($link) ?>" target="_blank" rel="noopener" aria-label="<?= e(ucfirst($network)) ?>">
                            <?= icon($network) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h3 class="footer-title">Sitio</h3>
            <ul class="footer-links">
                <li><a href="<?= url('/') ?>">Inicio</a></li>
                <li><a href="<?= url('/servicios') ?>">Servicios</a></li>
                <li><a href="<?= url('/portfolio') ?>">Portfolio</a></li>
                <li><a href="<?= url('/nosotros') ?>">Nosotros</a></li>
                <li><a href="<?= url('/contacto') ?>">Contacto</a></li>
            </ul>
        </div>

        <div>
            <h3 class="footer-title">Servicios</h3>
            <ul class="footer-links">
                <?php foreach (Service::all() as $service): ?>
                    <li><a href="<?= url('/servicios#' . $service->slug) ?>"><?= e($service->title) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h3 class="footer-title">Contacto</h3>
            <ul class="footer-contact">
                <li><?= icon('mail') ?><a href="mailto:<?= e(config('contact.email')) ?>"><?= e(config('contact.email')) ?></a></li>
                <li><?= icon('whatsapp') ?><a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><?= e(config('contact.phone')) ?></a></li>
                <li><?= icon('map') ?><span><?= e(config('contact.location')) ?></span></li>
            </ul>
        </div>
    </div>

    <div class="container footer-bottom">
        <p>© <?= date('Y') ?> <?= e(config('app.name')) ?>. Todos los derechos reservados.</p>
        <p>Hecho con código propio, sin plantillas.</p>
    </div>
</footer>
