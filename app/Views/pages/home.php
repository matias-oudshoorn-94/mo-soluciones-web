<?php
/**
 * @var list<\App\Models\Service> $services
 * @var list<\App\Models\Project> $projects
 */
use App\Core\View;

$steps = [
    ['chat',   'Charlamos',     'Me contás tu idea, tus objetivos y tu presupuesto. Sin tecnicismos.'],
    ['pencil', 'Propuesta',     'Te envío una propuesta clara con alcance, tiempos y costo cerrado.'],
    ['code',   'Desarrollo',    'Diseño y programo tu proyecto con avances que podés revisar.'],
    ['rocket', 'Lanzamiento',   'Publicamos, te capacito y te acompaño con soporte post-entrega.'],
];
?>
<section class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container hero-inner">
        <div class="hero-copy">
            <span class="eyebrow"><span class="dot"></span> Desarrollo web a medida</span>
            <h1>Soluciones web que hacen <span class="gradient-text">crecer tu negocio</span></h1>
            <p class="lead">
                Sitios institucionales, tiendas online, sistemas de gestión y SEO.
                Desarrollo rápido, seguro y pensado para que tus clientes te encuentren y te elijan.
            </p>
            <div class="hero-actions">
                <a href="<?= url('/contacto') ?>" class="btn btn-primary">Pedí tu presupuesto <?= icon('arrow') ?></a>
                <a href="<?= url('/portfolio') ?>" class="btn btn-ghost">Ver proyectos</a>
            </div>
            <ul class="hero-points">
                <li><?= icon('check') ?> Respuesta en 24 h</li>
                <li><?= icon('check') ?> Presupuesto sin cargo</li>
                <li><?= icon('check') ?> Soporte post-entrega</li>
            </ul>
        </div>

        <div class="hero-visual" aria-hidden="true">
            <div class="code-window">
                <div class="preview-bar"><i></i><i></i><i></i><span>tu-proyecto.php</span></div>
<pre><code><span class="c-k">final class</span> <span class="c-t">TuNegocio</span>
{
    <span class="c-k">public function</span> <span class="c-f">crecer</span>(): <span class="c-t">Resultado</span>
    {
        <span class="c-k">return</span> <span class="c-k">new</span> <span class="c-t">Web</span>(
            diseño: <span class="c-s">'a medida'</span>,
            velocidad: <span class="c-s">'⚡ rápida'</span>,
            seo: <span class="c-k">true</span>,
        );
    }
}</code></pre>
            </div>
            <div class="float-card fc-1"><?= icon('chart') ?><div><strong>+180%</strong><span>tráfico orgánico</span></div></div>
            <div class="float-card fc-2"><?= icon('zap') ?><div><strong>&lt; 1 s</strong><span>tiempo de carga</span></div></div>
        </div>
    </div>
</section>

<section class="section">
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

<section class="section section-alt">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Portfolio</span>
            <h2>Proyectos recientes</h2>
            <p>Algunos trabajos que ayudaron a mis clientes a vender más y trabajar mejor.</p>
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

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Cómo trabajo</span>
            <h2>Un proceso simple y transparente</h2>
            <p>Sabés en todo momento en qué etapa está tu proyecto.</p>
        </div>

        <ol class="steps">
            <?php foreach ($steps as $i => [$stepIcon, $title, $text]): ?>
                <li class="step reveal">
                    <span class="step-num"><?= $i + 1 ?></span>
                    <span class="card-icon"><?= icon($stepIcon) ?></span>
                    <h3><?= e($title) ?></h3>
                    <p><?= e($text) ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="section section-alt">
    <div class="container why">
        <div class="reveal">
            <span class="eyebrow">Por qué elegirnos</span>
            <h2>Trato directo con quien desarrolla tu proyecto</h2>
            <p class="lead">
                Sin intermediarios ni respuestas automáticas: hablás directamente con el desarrollador.
                Eso significa decisiones más rápidas, menos malentendidos y un resultado que se ajusta a lo que necesitás.
            </p>
            <a href="<?= url('/nosotros') ?>" class="btn btn-ghost">Conocé más</a>
        </div>
        <ul class="why-list">
            <li class="reveal"><?= icon('code') ?><div><h3>Código a medida</h3><p>Nada de plantillas pesadas: tu sitio carga rápido y es fácil de mantener.</p></div></li>
            <li class="reveal"><?= icon('search') ?><div><h3>SEO desde el inicio</h3><p>Cada proyecto sale optimizado para buscadores.</p></div></li>
            <li class="reveal"><?= icon('shield') ?><div><h3>Seguridad</h3><p>Buenas prácticas, HTTPS y backups para que duermas tranquilo.</p></div></li>
            <li class="reveal"><?= icon('target') ?><div><h3>Foco en resultados</h3><p>Medimos visitas, consultas y ventas, no solo diseño.</p></div></li>
        </ul>
    </div>
</section>

<?= View::partial('cta') ?>
