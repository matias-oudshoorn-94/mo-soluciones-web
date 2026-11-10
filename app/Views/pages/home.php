<?php
/**
 * @var list<\App\Models\Service> $services
 * @var list<\App\Models\Project> $projects
 * @var list<\App\Models\Project> $clients
 * @var list<array{q: string, a: string}> $faqs
 * @var int $projectCount
 */
use App\Core\View;

// Lo que resolvemos por el cliente.
$included = [
    ['map',      'Dominio',            'Registramos tu .com o .com.ar y nos ocupamos de las renovaciones.'],
    ['layers',   'Hosting',            'Servidor rápido y seguro, contratado y configurado por nosotros.'],
    ['shield',   'Seguridad SSL',      'Certificado HTTPS, backups automáticos y actualizaciones.'],
    ['mail',     'Emails corporativos', 'Casillas nombre@tuempresa.com listas para usar.'],
    ['pencil',   'Diseño y desarrollo', 'Tu sitio, tienda o sistema hecho a medida.'],
    ['building', 'Carga de contenidos', 'Textos, fotos y productos: los cargamos nosotros.'],
    ['search',   'Alta en Google',     'Search Console, Google Business y analítica configurados.'],
    ['clock',    'Mantenimiento',      'Cambios, soporte y monitoreo después de la entrega.'],
];

$steps = [
    ['Hoy',      'chat',   'Nos contás qué necesitás', 'Por WhatsApp, llamada o el formulario. Sin tecnicismos.'],
    ['En 24 h',  'pencil', 'Recibís tu presupuesto',   'Precio cerrado, alcance claro y fecha de entrega concreta.'],
    ['En días',  'code',   'Desarrollamos',            'Diseñamos y programamos con avances que podés revisar.'],
    ['Listo',    'rocket', 'Tu web online',            'Con dominio, hosting y emails funcionando. Sin que muevas un dedo.'],
];
?>
<section class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container hero-inner">
        <div class="hero-copy">
            <span class="eyebrow"><span class="dot"></span> Llave en mano · Sin vueltas</span>
            <h1>Tu web lista en días. <span class="gradient-text">Nosotros nos encargamos de todo.</span></h1>
            <p class="lead">
                Presupuesto en 24 horas, desarrollo rápido y nos ocupamos del dominio, el hosting, los emails y el mantenimiento.
                Vos no tenés que hacer nada: solo contarnos qué necesitás.
            </p>
            <div class="hero-actions">
                <a href="<?= url('/contacto') ?>" class="btn btn-primary">Presupuesto en 24 h <?= icon('arrow') ?></a>
                <a href="<?= e(whatsapp_link('Hola! Quiero un presupuesto para mi web.')) ?>" class="btn btn-ghost" target="_blank" rel="noopener"><?= icon('whatsapp') ?> Escribinos</a>
            </div>
            <ul class="hero-points">
                <li><?= icon('check') ?> Presupuesto en 24 h</li>
                <li><?= icon('check') ?> Entrega en días, no meses</li>
                <li><?= icon('check') ?> Dominio y hosting incluidos</li>
            </ul>
        </div>

        <div class="hero-visual" aria-hidden="true">
            <div class="launch-card">
                <div class="preview-bar"><i></i><i></i><i></i><span>tuempresa.com.ar</span></div>
                <div class="launch-body">
                    <p class="launch-title">Tu proyecto</p>
                    <ul class="launch-list">
                        <li><?= icon('check') ?> Dominio registrado</li>
                        <li><?= icon('check') ?> Hosting y SSL configurados</li>
                        <li><?= icon('check') ?> Emails corporativos</li>
                        <li><?= icon('check') ?> Diseño y desarrollo</li>
                        <li><?= icon('check') ?> Alta en Google</li>
                        <li><?= icon('check') ?> Mantenimiento activo</li>
                    </ul>
                    <div class="launch-progress"><span></span></div>
                    <p class="launch-status"><strong>¡Online!</strong> Vos no tuviste que hacer nada.</p>
                </div>
            </div>
            <div class="float-card fc-2"><?= icon('zap') ?><div><strong>24 h</strong><span>para tu presupuesto</span></div></div>
            <div class="float-card fc-1"><?= icon('rocket') ?><div><strong>+100 proyectos</strong><span>activos y funcionando</span></div></div>
        </div>
    </div>
</section>

<section class="clients-band" aria-labelledby="clients-title">
    <div class="container">
        <p class="clients-title" id="clients-title">Empresas e instituciones que confían en nosotros</p>
        <?= View::partial('client-logos', ['clients' => $clients]) ?>
    </div>
</section>

<section class="section section-alt" id="todo-incluido">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Todo incluido</span>
            <h2>Vos no tenés que hacer nada</h2>
            <p>Nos ocupamos de todo lo técnico, de principio a fin. Un solo contacto para tu web, tu dominio, tu hosting y tus emails.</p>
        </div>

        <div class="split reveal">
            <div class="split-you">
                <p class="split-label">Vos</p>
                <ol class="you-steps">
                    <li>Nos contás qué necesitás</li>
                    <li>Aprobás el presupuesto</li>
                    <li>Recibís tu web funcionando</li>
                </ol>
            </div>
            <div class="split-us">
                <p class="split-label">Nosotros</p>
                <ul class="included">
                    <?php foreach ($included as [$itemIcon, $title, $text]): ?>
                        <li>
                            <span class="included-icon"><?= icon($itemIcon) ?></span>
                            <div><h3><?= e($title) ?></h3><p><?= e($text) ?></p></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Rápido de verdad</span>
            <h2>De la idea a tu web online, en días</h2>
            <p>Sin esperas eternas ni idas y vueltas. Sabés desde el primer día cuánto cuesta y cuándo está lista.</p>
        </div>

        <ol class="steps">
            <?php foreach ($steps as [$when, $stepIcon, $title, $text]): ?>
                <li class="step reveal">
                    <span class="step-when"><?= e($when) ?></span>
                    <span class="card-icon"><?= icon($stepIcon) ?></span>
                    <h3><?= e($title) ?></h3>
                    <p><?= e($text) ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Servicios</span>
            <h2>Todo lo que tu negocio necesita en la web</h2>
            <p>Desde tu primera web hasta sistemas a medida que automatizan tu operación.</p>
        </div>

        <div class="grid grid-4">
            <?php foreach ($services as $service): ?>
                <article class="card reveal">
                    <span class="card-icon"><?= icon($service->icon) ?></span>
                    <h3><?= e($service->title) ?></h3>
                    <p><?= e($service->summary) ?></p>
                    <a href="<?= url('/servicios#' . $service->slug) ?>" class="link-arrow">Más info <?= icon('arrow') ?></a>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="center mt-lg reveal">
            <a href="<?= url('/servicios') ?>" class="btn btn-ghost">Ver todos los servicios</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Portfolio</span>
            <h2>Proyectos recientes</h2>
            <p>Sitios, tiendas y sistemas que ya están online y funcionando para nuestros clientes.</p>
        </div>

        <div class="grid grid-3">
            <?php foreach ($projects as $project): ?>
                <?= View::partial('project-card', ['project' => $project]) ?>
            <?php endforeach; ?>
        </div>

        <div class="center mt-lg reveal">
            <a href="<?= url('/portfolio') ?>" class="btn btn-ghost">Ver portfolio completo</a>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container why">
        <div class="reveal">
            <span class="eyebrow">Por qué elegirnos</span>
            <h2>Rápidos, claros y con todo resuelto</h2>
            <p class="lead">
                Hablás directamente con quien desarrolla tu proyecto. Sin intermediarios, sin respuestas automáticas
                y sin tener que coordinar con cinco proveedores distintos: dominio, hosting, diseño y soporte, todo en un mismo lugar.
            </p>
            <a href="<?= url('/nosotros') ?>" class="btn btn-ghost">Conocé más</a>
        </div>
        <ul class="why-list">
            <li class="reveal"><?= icon('zap') ?><div><h3>Entrega rápida</h3><p>Presupuesto en 24 h y tu web lista en días, con fecha de entrega concreta.</p></div></li>
            <li class="reveal"><?= icon('shield') ?><div><h3>Todo incluido</h3><p>Dominio, hosting, SSL, emails y mantenimiento. No tenés que contratar nada aparte.</p></div></li>
            <li class="reveal"><?= icon('chat') ?><div><h3>Un solo contacto</h3><p>Ante cualquier cosa, nos escribís a nosotros y lo resolvemos.</p></div></li>
            <li class="reveal"><?= icon('code') ?><div><h3>Hecho a medida</h3><p>Sitios rápidos, optimizados para Google y fáciles de mantener.</p></div></li>
        </ul>
    </div>
</section>

<section class="section">
    <div class="container faq-wrap">
        <div class="section-head reveal">
            <span class="eyebrow">Preguntas frecuentes</span>
            <h2>Lo que nos suelen preguntar</h2>
        </div>
        <?= View::partial('faq', ['faqs' => $faqs]) ?>
    </div>
</section>

<?= View::partial('cta') ?>
