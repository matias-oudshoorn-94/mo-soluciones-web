<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Servicios que ofrece la empresa.
 * Para agregar o quitar servicios, editá el array de all().
 */
final readonly class Service
{
    /**
     * @param list<string> $features
     */
    public function __construct(
        public string $slug,
        public string $icon,
        public string $title,
        public string $summary,
        public string $description,
        public array $features,
    ) {}

    /** @return list<self> */
    public static function all(): array
    {
        return [
            new self(
                slug: 'institucionales',
                icon: 'building',
                title: 'Sitios institucionales',
                summary: 'Una web profesional que transmite confianza y presenta tu empresa como se merece.',
                description: 'Diseño y desarrollo sitios rápidos, claros y fáciles de administrar, pensados para que tus clientes entiendan qué hacés y te contacten.',
                features: ['Diseño a medida y responsive', 'Panel para editar contenidos', 'Formularios y WhatsApp integrados', 'Optimizado para velocidad'],
            ),
            new self(
                slug: 'ecommerce',
                icon: 'cart',
                title: 'Tiendas online',
                summary: 'Vendé las 24 horas con una tienda segura, rápida y fácil de gestionar.',
                description: 'Tiendas a medida o sobre plataformas líderes, con medios de pago, envíos y gestión de stock integrados.',
                features: ['Mercado Pago y tarjetas', 'Cálculo de envíos', 'Gestión de productos y stock', 'Reportes de ventas'],
            ),
            new self(
                slug: 'sistemas',
                icon: 'layers',
                title: 'Sistemas de gestión',
                summary: 'Software a medida para ordenar tu operación: clientes, stock, turnos, facturación.',
                description: 'Analizo tus procesos y desarrollo sistemas web que automatizan tareas repetitivas y centralizan la información de tu negocio.',
                features: ['Usuarios y permisos', 'Reportes y exportación', 'Integraciones con APIs', 'Acceso desde cualquier dispositivo'],
            ),
            new self(
                slug: 'seo',
                icon: 'search',
                title: 'SEO y posicionamiento',
                summary: 'Que te encuentren en Google cuando te están buscando.',
                description: 'Optimización técnica y de contenidos para mejorar tu visibilidad en buscadores y atraer visitas que se convierten en clientes.',
                features: ['Auditoría SEO técnica', 'Palabras clave y contenidos', 'Google Business Profile', 'Informes mensuales'],
            ),
            new self(
                slug: 'landing',
                icon: 'rocket',
                title: 'Landing pages',
                summary: 'Páginas enfocadas en convertir para tus campañas de publicidad.',
                description: 'Landings rápidas y medibles, listas para Google Ads y Meta Ads, con seguimiento de conversiones.',
                features: ['Diseño orientado a conversión', 'Pruebas A/B', 'Píxeles y analítica', 'Entrega rápida'],
            ),
            new self(
                slug: 'mantenimiento',
                icon: 'shield',
                title: 'Mantenimiento y soporte',
                summary: 'Tu web siempre actualizada, segura y funcionando.',
                description: 'Planes mensuales de mantenimiento: copias de seguridad, actualizaciones, monitoreo y cambios menores.',
                features: ['Backups automáticos', 'Actualizaciones de seguridad', 'Monitoreo de disponibilidad', 'Soporte prioritario'],
            ),
        ];
    }

    /** Los primeros servicios, para mostrar en el inicio. */
    public static function featured(int $limit = 4): array
    {
        return array_slice(self::all(), 0, $limit);
    }
}
