<?php
/**
 * Preguntas frecuentes con datos estructurados para Google.
 * @var list<array{q: string, a: string}> $faqs
 */
?>
<div class="faq">
    <?php foreach ($faqs as $i => $faq): ?>
        <details class="faq-item reveal" <?= $i === 0 ? 'open' : '' ?>>
            <summary><?= e($faq['q']) ?><span class="faq-icon" aria-hidden="true"></span></summary>
            <p><?= e($faq['a']) ?></p>
        </details>
    <?php endforeach; ?>
</div>
<script type="application/ld+json">
<?= json_encode([
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => array_map(static fn (array $f): array => [
        '@type'          => 'Question',
        'name'           => $f['q'],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
    ], $faqs),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?>

</script>
