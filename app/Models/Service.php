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
                description: 'Diseñamos y desarrollamos sitios rápidos, claros y fáciles de administrar, pensados para que tus clientes entiendan qué hacés y te contacten. Lo publicamos con tu dominio, hosting y emails ya funcionando.',
                features: ['Diseño a medida y responsive', 'Dominio, hosting y emails incluidos', 'Formularios y WhatsApp integrados', 'Entrega en días'],
            ),
            new self(
                slug: 'ecommerce',
                icon: 'cart',
                title: 'Tiendas online',
                summary: 'Vendé las 24 horas con una tienda segura, rápida y fácil de gestionar.',
                description: 'Tiendas a medida con medios de pago, envíos y gestión de stock integrados. Cargamos tus productos y dejamos todo configurado para que empieces a vender.',
                features: ['Mercado Pago y tarjetas', 'Cálculo de envíos', 'Carga inicial de productos', 'Gestión de stock y pedidos'],
            ),
            new self(
                slug: 'sistemas',
                icon: 'layers',
                title: 'Sistemas de gestión',
                summary: 'Software a medida para ordenar tu operación: clientes, stock, turnos, facturación.',
                description: 'Analizamos tus procesos y desarrollamos sistemas web que automatizan tareas repetitivas y centralizan la información de tu negocio. Nos ocupamos también del servidor y los backups.',
                features: ['Usuarios y permisos', 'Reportes y exportación', 'Integraciones con APIs', 'Acceso desde cualquier dispositivo'],
            ),
            new self(
                slug: 'seo',
                icon: 'search',
                title: 'SEO y posicionamiento',
                summary: 'Que te encuentren en Google cuando te están buscando.',
                description: 'Optimización técnica y de contenidos para mejorar tu visibilidad en buscadores y atraer visitas que se convierten en clientes. Configuramos Search Console, Google Business y la analítica por vos.',
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
                slug: 'hosting',
                icon: 'shield',
                title: 'Hosting, dominio y mantenimiento',
                summary: 'Nos encargamos de todo lo técnico para que vos no tengas que hacer nada.',
                description: 'Registramos y renovamos tu dominio, contratamos y administramos el hosting, creamos tus emails corporativos y mantenemos tu web segura y actualizada. Si ya tenés todo contratado, lo migramos sin cortes.',
                features: ['Registro y renovación del dominio', 'Hosting rápido con SSL', 'Emails nombre@tuempresa.com', 'Backups, actualizaciones y soporte'],
            ),
        ];
    }

    /** Los primeros servicios, para mostrar en el inicio. */
    public static function featured(int $limit = 4): array
    {
        return array_slice(self::all(), 0, $limit);
    }
}
