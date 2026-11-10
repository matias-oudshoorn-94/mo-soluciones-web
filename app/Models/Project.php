<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Proyectos del portfolio.
 *
 * IMPORTANTE: los proyectos cargados son EJEMPLOS. Reemplazalos por tus
 * trabajos reales. Si agregás capturas, guardalas en public/assets/img/portfolio/
 * y poné el nombre del archivo en "image" (ej: 'image' => 'mi-proyecto.jpg').
 * Si "image" queda vacío, se muestra una vista previa ilustrada.
 */
final readonly class Project
{
    /**
     * @param list<string> $results
     * @param list<string> $stack
     */
    public function __construct(
        public string $slug,
        public string $title,
        public string $client,
        public Category $category,
        public int $year,
        public string $summary,
        public string $challenge,
        public string $solution,
        public array $results,
        public array $stack,
        public string $url = '',
        public string $image = '',
        public string $accent = '#0878F9',
    ) {}

    /** @return list<self> */
    public static function all(): array
    {
        return [
            new self(
                slug: 'tienda-almacen-natural',
                title: 'Tienda online de productos naturales',
                client: 'Almacén Natural',
                category: Category::Ecommerce,
                year: 2026,
                summary: 'E-commerce con más de 800 productos, pagos online y envíos a todo el país.',
                challenge: 'El cliente vendía solo por Instagram y WhatsApp, con stock desordenado y mucho tiempo perdido respondiendo consultas de precios.',
                solution: 'Desarrollé una tienda online con catálogo filtrable, Mercado Pago, cálculo de envíos y un panel para gestionar stock y pedidos.',
                results: ['+65% de ventas en 6 meses', 'Pedidos automatizados', 'Stock sincronizado'],
                stack: ['PHP 8', 'MySQL', 'JavaScript', 'Mercado Pago API'],
                accent: '#00B9F2',
            ),
            new self(
                slug: 'estudio-contable-rios',
                title: 'Sitio institucional para estudio contable',
                client: 'Estudio Contable Ríos',
                category: Category::Institucional,
                year: 2026,
                summary: 'Sitio profesional con servicios, equipo, novedades impositivas y área de clientes.',
                challenge: 'El estudio tenía una web desactualizada que no reflejaba su trayectoria y no generaba consultas.',
                solution: 'Rediseño completo con foco en confianza, contenidos claros por servicio y formularios que llegan directo al área correspondiente.',
                results: ['3× más consultas', 'Carga en menos de 1 s', 'Autogestión de novedades'],
                stack: ['PHP 8', 'HTML5', 'CSS3', 'JavaScript'],
                accent: '#0878F9',
            ),
            new self(
                slug: 'sistema-turnos-clinica',
                title: 'Sistema de turnos para clínica',
                client: 'Centro Médico del Sur',
                category: Category::Sistemas,
                year: 2025,
                summary: 'Gestión de turnos online, agenda de profesionales y recordatorios automáticos.',
                challenge: 'Los turnos se tomaban por teléfono y en planillas, con superposiciones y un alto porcentaje de ausencias.',
                solution: 'Sistema web con reserva online para pacientes, agenda por profesional, historial y recordatorios por email y WhatsApp.',
                results: ['-40% de ausencias', 'Agenda centralizada', 'Reservas 24/7'],
                stack: ['PHP 8', 'MySQL', 'JavaScript', 'API de WhatsApp'],
                accent: '#00B9F2',
            ),
            new self(
                slug: 'seo-inmobiliaria-horizonte',
                title: 'Posicionamiento SEO para inmobiliaria',
                client: 'Inmobiliaria Horizonte',
                category: Category::Seo,
                year: 2025,
                summary: 'Estrategia SEO local que llevó a la inmobiliaria a la primera página de Google.',
                challenge: 'Dependían 100% de portales pagos y su web casi no recibía visitas orgánicas.',
                solution: 'Auditoría técnica, optimización de fichas de propiedades, contenidos por barrio y Google Business Profile.',
                results: ['+180% de tráfico orgánico', 'Top 3 en búsquedas locales', 'Menos gasto en portales'],
                stack: ['SEO técnico', 'Search Console', 'Analytics 4', 'Schema.org'],
                accent: '#0878F9',
            ),
            new self(
                slug: 'sistema-stock-distribuidora',
                title: 'Sistema de stock y facturación',
                client: 'Distribuidora Norte',
                category: Category::Sistemas,
                year: 2025,
                summary: 'Control de stock multi-depósito, pedidos de vendedores y facturación electrónica.',
                challenge: 'Planillas de Excel compartidas, errores de stock y facturación manual que llevaba horas por día.',
                solution: 'Sistema a medida con depósitos, listas de precios, app web para vendedores y facturación electrónica integrada.',
                results: ['Facturación en segundos', 'Stock en tiempo real', 'Reportes diarios automáticos'],
                stack: ['PHP 8', 'MySQL', 'JavaScript', 'Facturación electrónica'],
                accent: '#00B9F2',
            ),
            new self(
                slug: 'tienda-indumentaria-urbana',
                title: 'E-commerce de indumentaria',
                client: 'Urbana Indumentaria',
                category: Category::Ecommerce,
                year: 2024,
                summary: 'Tienda con talles, colores, cupones de descuento y carrito optimizado para celulares.',
                challenge: 'La mayoría de las visitas llegaban desde el celular, pero la tienda anterior era lenta y difícil de usar en pantallas chicas.',
                solution: 'Tienda mobile-first con fotos optimizadas, checkout en pocos pasos y campañas de descuento configurables.',
                results: ['+50% de conversión mobile', 'Checkout en 3 pasos', 'Campañas autogestionables'],
                stack: ['PHP 8', 'MySQL', 'JavaScript', 'Mercado Pago API'],
                accent: '#0878F9',
            ),
        ];
    }

    public static function findBySlug(string $slug): ?self
    {
        return array_find(self::all(), static fn (self $p): bool => $p->slug === $slug);
    }

    /** @return list<self> */
    public static function latest(int $limit = 3): array
    {
        return array_slice(self::all(), 0, $limit);
    }

    /** Otros proyectos para sugerir al final del detalle. */
    public function related(int $limit = 2): array
    {
        $others = array_filter(self::all(), fn (self $p): bool => $p->slug !== $this->slug);
        usort($others, fn (self $a, self $b): int => ($b->category === $this->category) <=> ($a->category === $this->category));
        return array_slice($others, 0, $limit);
    }

    /** @return list<Category> categorías que tienen al menos un proyecto */
    public static function categories(): array
    {
        $used = array_map(static fn (self $p): Category => $p->category, self::all());
        return array_values(array_filter(Category::cases(), static fn (Category $c): bool => in_array($c, $used, true)));
    }
}
