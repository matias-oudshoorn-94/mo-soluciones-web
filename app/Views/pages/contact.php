<?php
/**
 * @var array<string, string> $services
 * @var array<string, string> $errors
 * @var array<string, string> $old
 * @var string|null $alert
 * @var string $csrf
 * @var int $formStart
 * @var string $preset
 */
$val = static fn (string $key): string => e($old[$key] ?? '');
$err = static fn (string $key): string => isset($errors[$key])
    ? '<span class="field-error" id="' . $key . '-error">' . e($errors[$key]) . '</span>'
    : '';
$invalid = static fn (string $key): string => isset($errors[$key])
    ? 'aria-invalid="true" aria-describedby="' . $key . '-error"'
    : '';
$selected = $old['service'] ?? $preset;
?>
<section class="page-hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container">
        <span class="eyebrow">Contacto</span>
        <h1>Hablemos de <span class="gradient-text">tu proyecto</span></h1>
        <p class="lead">Completá el formulario y te respondo en menos de 24 horas hábiles con una propuesta a medida.</p>
    </div>
</section>

<section class="section pt-0" id="formulario">
    <div class="container contact-grid">
        <div class="contact-card reveal">
            <?php if ($alert): ?>
                <div class="alert" role="alert"><?= e($alert) ?></div>
            <?php elseif ($errors): ?>
                <div class="alert" role="alert">Revisá los campos marcados.</div>
            <?php endif; ?>

            <form action="<?= url('/contacto') ?>" method="post" class="form" novalidate data-contact-form>
                <input type="hidden" name="_token" value="<?= e($csrf) ?>">
                <input type="hidden" name="_ts" value="<?= $formStart ?>">
                <div class="hp" aria-hidden="true">
                    <label for="website">No completar</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <div class="form-row">
                    <div class="field">
                        <label for="name">Nombre *</label>
                        <input type="text" id="name" name="name" required maxlength="100" autocomplete="name" value="<?= $val('name') ?>" <?= $invalid('name') ?>>
                        <?= $err('name') ?>
                    </div>
                    <div class="field">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required maxlength="150" autocomplete="email" value="<?= $val('email') ?>" <?= $invalid('email') ?>>
                        <?= $err('email') ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="field">
                        <label for="phone">Teléfono / WhatsApp</label>
                        <input type="tel" id="phone" name="phone" maxlength="40" autocomplete="tel" value="<?= $val('phone') ?>" <?= $invalid('phone') ?>>
                        <?= $err('phone') ?>
                    </div>
                    <div class="field">
                        <label for="company">Empresa</label>
                        <input type="text" id="company" name="company" maxlength="100" autocomplete="organization" value="<?= $val('company') ?>">
                    </div>
                </div>

                <div class="field">
                    <label for="service">¿Qué necesitás? *</label>
                    <select id="service" name="service" required <?= $invalid('service') ?>>
                        <option value="">Elegí una opción</option>
                        <?php foreach ($services as $key => $label): ?>
                            <option value="<?= e($key) ?>" <?= $selected === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= $err('service') ?>
                </div>

                <div class="field">
                    <label for="message">Contame sobre tu proyecto *</label>
                    <textarea id="message" name="message" rows="6" required minlength="10" maxlength="3000"
                              placeholder="¿A qué se dedica tu negocio? ¿Qué te gustaría lograr? ¿Tenés una fecha en mente?" <?= $invalid('message') ?>><?= $val('message') ?></textarea>
                    <?= $err('message') ?>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Enviar consulta <?= icon('arrow') ?></button>
                <p class="form-note">Tus datos se usan solo para responder tu consulta.</p>
            </form>
        </div>

        <aside class="contact-info reveal">
            <h2>Otras formas de contacto</h2>
            <ul class="contact-list">
                <li>
                    <span class="card-icon"><?= icon('whatsapp') ?></span>
                    <div><strong>WhatsApp</strong><a href="<?= e(whatsapp_link('Hola! Quiero consultar por un proyecto web.')) ?>" target="_blank" rel="noopener"><?= e(config('contact.phone')) ?></a></div>
                </li>
                <li>
                    <span class="card-icon"><?= icon('mail') ?></span>
                    <div><strong>Email</strong><a href="mailto:<?= e(config('contact.email')) ?>"><?= e(config('contact.email')) ?></a></div>
                </li>
                <li>
                    <span class="card-icon"><?= icon('map') ?></span>
                    <div><strong>Ubicación</strong><span><?= e(config('contact.location')) ?></span></div>
                </li>
                <li>
                    <span class="card-icon"><?= icon('clock') ?></span>
                    <div><strong>Horario</strong><span><?= e(config('contact.hours')) ?></span></div>
                </li>
            </ul>
        </aside>
    </div>
</section>
