<?php
/**
 * Layout principal.
 * @var string $content
 * @var array{title: string, description: string, canonical: string} $meta
 */
use App\Core\View;
?>
<!doctype html>
<html lang="<?= e(config('app.locale', 'es')) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($meta['title']) ?></title>
    <meta name="description" content="<?= e($meta['description']) ?>">
    <link rel="canonical" href="<?= e($meta['canonical']) ?>">
    <meta name="theme-color" content="#050D1C">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e(config('app.name')) ?>">
    <meta property="og:title" content="<?= e($meta['title']) ?>">
    <meta property="og:description" content="<?= e($meta['description']) ?>">
    <meta property="og:url" content="<?= e($meta['canonical']) ?>">
    <meta property="og:image" content="<?= e(rtrim((string) config('app.url'), '/') . '/assets/img/logo.png') ?>">

    <script>document.documentElement.classList.add('js')</script>
    <link rel="icon" type="image/png" href="<?= asset('img/favicon.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">

    <script type="application/ld+json">
    <?= json_encode([
        '@context' => 'https://schema.org',
        '@type'    => 'ProfessionalService',
        'name'     => config('app.name'),
        'url'      => config('app.url'),
        'email'    => config('contact.email'),
        'telephone'=> config('contact.phone'),
        'logo'     => rtrim((string) config('app.url'), '/') . '/assets/img/logo.png',
        'areaServed' => 'AR',
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?>

    </script>
</head>
<body>
    <a class="skip-link" href="#main">Saltar al contenido</a>

    <?= View::partial('header') ?>

    <main id="main">
        <?= $content ?>
    </main>

    <?= View::partial('footer') ?>

    <a class="whatsapp-float" href="<?= e(whatsapp_link('Hola! Quiero consultar por un proyecto web.')) ?>"
       target="_blank" rel="noopener" aria-label="Escribinos por WhatsApp">
        <?= icon('whatsapp') ?>
    </a>

    <script src="<?= asset('js/main.js') ?>" defer></script>
</body>
</html>
