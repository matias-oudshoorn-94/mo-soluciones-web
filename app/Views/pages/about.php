<?php
use App\Core\View;

$values = [
    ['chat',   'Comunicación clara', 'Te explico todo en simple y respondo rápido. Sabés siempre en qué estado está tu proyecto.'],
    ['target', 'Foco en tu negocio', 'No hago webs lindas porque sí: cada decisión apunta a que consigas más clientes.'],
    ['code',   'Calidad técnica',    'Código limpio, seguro y documentado, fácil de mantener y escalar en el tiempo.'],
    ['shield', 'Compromiso',         'Cumplo plazos y presupuestos. Y después de la entrega, sigo estando.'],
];

$stack = ['PHP 8', 'JavaScript', 'HTML5', 'CSS3', 'MySQL', 'APIs REST', 'Mercado Pago', 'Git', 'SEO técnico', 'Google Analytics'];
?>
<section class="page-hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container">
        <span class="eyebrow">Nosotros</span>
        <h1>Tecnología con <span class="gradient-text">trato humano</span></h1>
        <p class="lead">Mo Soluciones Web nace para ayudar a empresas y emprendedores a tener presencia digital profesional, sin vueltas y con resultados medibles.</p>
    </div>
</section>

<section class="section">
    <div class="container about-grid">
        <div class="reveal">
            <h2>Quién está detrás</h2>
            <p>Soy desarrollador web especializado en soluciones a medida: sitios institucionales, tiendas online, sistemas de gestión y posicionamiento en buscadores.</p>
            <p>Trabajo de forma directa con cada cliente, entendiendo su negocio antes de escribir una línea de código. Así cada proyecto resuelve un problema concreto: vender más, ahorrar tiempo o llegar a nuevos clientes.</p>
            <p>Me gusta construir cosas simples, rápidas y que duren. Si necesitás una web o un sistema y no sabés por dónde empezar, charlemos.</p>
            <a href="<?= url('/contacto') ?>" class="btn btn-primary">Hablemos de tu proyecto <?= icon('arrow') ?></a>
        </div>

        <div class="stats reveal">
            <div class="stat"><strong data-count="50">50</strong><span>+ proyectos entregados</span></div>
            <div class="stat"><strong data-count="8">8</strong><span>años de experiencia</span></div>
            <div class="stat"><strong data-count="24">24</strong><span>h de tiempo de respuesta</span></div>
            <div class="stat"><strong data-count="100">100</strong><span>% código a medida</span></div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Valores</span>
            <h2>Cómo trabajo</h2>
        </div>
        <div class="grid grid-4">
            <?php foreach ($values as [$valueIcon, $title, $text]): ?>
                <article class="card reveal">
                    <span class="card-icon"><?= icon($valueIcon) ?></span>
                    <h3><?= e($title) ?></h3>
                    <p><?= e($text) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container center">
        <div class="section-head reveal">
            <span class="eyebrow">Tecnologías</span>
            <h2>Herramientas con las que trabajo</h2>
        </div>
        <div class="chips chips-lg reveal">
            <?php foreach ($stack as $tech): ?><span class="chip"><?= e($tech) ?></span><?php endforeach; ?>
        </div>
    </div>
</section>

<?= View::partial('cta') ?>
