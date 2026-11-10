<?php
/**
 * Grilla de logos de clientes. Cada logo enlaza a su proyecto.
 * @var list<\App\Models\Project> $clients
 */
?>
<ul class="client-logos">
    <?php foreach ($clients as $client): ?>
        <li class="reveal">
            <a href="<?= url('/portfolio/' . $client->slug) ?>" class="client-logo" style="--logo-bg: <?= e($client->logoBg) ?>" title="<?= e($client->client) ?>">
                <img src="<?= asset('img/clients/' . $client->logo) ?>" alt="<?= e($client->client) ?>" loading="lazy">
            </a>
        </li>
    <?php endforeach; ?>
</ul>
