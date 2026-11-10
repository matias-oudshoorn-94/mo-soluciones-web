<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Proyectos del portfolio.
 *
 * - Capturas: public/assets/img/portfolio/{image}
 * - Logos:    public/assets/img/clients/{logo}
 * - logoBg:   color de fondo de la tarjeta del logo (para que se lea bien,
 *             ej. logos blancos sobre el color de su marca).
 * - El orden del array es el orden en que se muestran. Los 3 primeros salen en el inicio.
 */
final readonly class Project
{
    /**
     * @param list<string> $features
     * @param list<string> $stack
     */
    public function __construct(
        public string $slug,
        public string $title,
        public string $client,
        public Category $category,
        public string $url,
        public string $summary,
        public string $description,
        public array $features,
        public array $stack = [],
        public string $image = '',
        public string $logo = '',
        public string $logoBg = '#FFFFFF',
        public string $accent = '#0878F9',
    ) {}

    /** @return list<self> */
    public static function all(): array
    {
        return [
            new self(
                slug: 'casarom',
                title: 'Tienda online de sanitarios, griferías y calefacción',
                client: 'CasaRom',
                category: Category::Ecommerce,
                url: 'https://casarom.com.ar/',
                summary: 'E-commerce de griferías, sanitarios, calefacción y termotanques con envíos a todo el país.',
                description: 'Tienda online para CasaRom, distribuidor de primeras marcas y de su línea propia Macson. Un catálogo amplio organizado por ambiente y categoría, con buscador, carrito y pago online, pensado para que el cliente encuentre rápido lo que necesita para su baño, cocina o instalación.',
                features: [
                    'Catálogo por ambientes y categorías (baño, cocina, calefacción, bombas…)',
                    'Buscador de productos',
                    'Carrito y pago online con Mercado Pago',
                    'Envíos a todo el país',
                    'Descuento por pago con transferencia',
                    'Pedido de presupuesto para obras',
                ],
                stack: ['PHP', 'Bootstrap', 'jQuery', 'Mercado Pago'],
                image: 'casarom.webp',
                logo: 'casarom.png',
                logoBg: '#AA001D',
            ),
            new self(
                slug: 'pdfcolor',
                title: 'Imprenta online: subí tu PDF y retiralo impreso',
                client: 'PDF Color',
                category: Category::Institucional,
                url: 'https://pdfcolor.com.ar/',
                summary: 'Sitio para imprenta de Mar del Plata donde los clientes suben sus archivos, eligen cómo imprimirlos y pasan a retirarlos.',
                description: 'Plataforma para PDF Color, imprenta de Mar del Plata. Además de presentar la empresa, permite que cada cliente suba sus archivos, configure la impresión, calcule el precio y haga el pedido online para después pasar a retirarlo.',
                features: [
                    'Subida de archivos PDF para imprimir',
                    'Calculador de precios',
                    'Catálogo de trabajos publicados',
                    'Cuentas de cliente y carrito de pedidos',
                    'Información de la imprenta y contacto',
                ],
                image: 'pdfcolor.webp',
                logo: 'pdfcolor.png',
            ),
            new self(
                slug: 'metallive',
                title: 'Plataforma para empresa de implantes traumatológicos',
                client: 'Metal Live',
                category: Category::Sistemas,
                url: 'https://metallive.com.ar/',
                summary: 'Empresa argentina de implantes traumatológicos, fundada por expertos con más de 20 años en el rubro.',
                description: 'Desarrollo para Metal Live, empresa argentina dedicada a la producción y distribución de implantes traumatológicos para profesionales y pacientes.',
                features: [
                    'Presentación de la empresa y sus productos',
                    'Sección de búsquedas laborales',
                    'Preguntas frecuentes',
                    'Contacto y WhatsApp',
                ],
                image: 'metallive.webp',
                logo: 'metallive.png',
                logoBg: '#2B303B',
            ),
            new self(
                slug: 'matafuegos-el-marplatense',
                title: 'Tienda online de equipos contra incendios',
                client: 'Matafuegos El Marplatense',
                category: Category::Ecommerce,
                url: 'https://www.matafuegoselmarplatense.com/',
                summary: 'E-commerce de extintores, señalización y sistemas de detección de incendios en Mar del Plata.',
                description: 'Tienda online para Matafuegos El Marplatense con todo su catálogo de seguridad contra incendios: extintores, equipamiento, señalización y sistemas de detección, con cuenta de cliente y compra online.',
                features: [
                    'Catálogo por tipo: extintores ABC, CO2, PQS, señalización, detectores',
                    'Carrito y cuenta de cliente',
                    'Productos destacados de la semana',
                    'Preguntas frecuentes sobre extintores',
                    'Suscripción al newsletter',
                ],
                stack: ['Bootstrap', 'jQuery'],
                image: 'matafuegos-el-marplatense.webp',
                logo: 'matafuegos-el-marplatense.png',
            ),
            new self(
                slug: 'codigo-suerte',
                title: 'Sistema de gestión para sucursales',
                client: 'PDF Color',
                category: Category::Sistemas,
                url: 'https://codigosuerte.com.ar/',
                summary: 'Sistema de administración de PDF Color con acceso por sucursal.',
                description: 'Sistema web de uso interno para PDF Color. Cada sucursal ingresa con su propio usuario para gestionar el trabajo diario de la imprenta desde el navegador.',
                features: [
                    'Acceso por sucursal con usuario y contraseña',
                    'Uso desde cualquier navegador',
                ],
                stack: ['PHP 8', 'CodeIgniter'],
                image: 'codigo-suerte.webp',
                logo: 'codigo-suerte.png',
            ),
            new self(
                slug: 'tecnofrio',
                title: 'Sitio para servicio técnico de electrodomésticos',
                client: 'Tecnofrío',
                category: Category::Institucional,
                url: 'https://tecnofrio.com.ar/',
                summary: 'Servicio técnico de heladeras, lavarropas y aire acondicionado en Mar del Plata, con service a domicilio.',
                description: 'Sitio institucional para Tecnofrío, servicio técnico integral de Mar del Plata. Presenta sus servicios por tipo de equipo, las marcas y seguros con los que trabajan y una galería de trabajos realizados, con contacto directo para pedir presupuesto.',
                features: [
                    'Servicios y productos por categoría',
                    'Galería de trabajos realizados',
                    'Marcas y seguros con los que trabajan',
                    'Novedades',
                    'Formulario de consulta y WhatsApp',
                ],
                stack: ['PHP', 'CodeIgniter', 'Bootstrap', 'jQuery'],
                image: 'tecnofrio.webp',
                logo: 'tecnofrio.png',
            ),
            new self(
                slug: 'comunidad-en-transito',
                title: 'Plataforma de comunidad y contenidos',
                client: 'Comunidad en Tránsito',
                category: Category::Institucional,
                url: 'https://comunidadentransito.com.ar/',
                summary: 'Comunidad online para crear, escribir y encontrarse con otros, a tu ritmo, con Silvina Oudshoorn.',
                description: 'Sitio y área de miembros para Comunidad en Tránsito. Las personas se suman a la comunidad y acceden a contenidos mensuales organizados por secciones, webinars y encuentros, además de los libros de la autora.',
                features: [
                    'Registro e ingreso de miembros',
                    'Contenidos por secciones: arte, técnicas, lecturas, audios y videos',
                    'Webinars y encuentros mensuales',
                    'Libros con descuento para miembros',
                    'Pagos con Mercado Pago',
                ],
                stack: ['PHP 8', 'Mercado Pago'],
                image: 'comunidad-en-transito.webp',
                logo: 'comunidad-en-transito.png',
            ),
            new self(
                slug: 'jetcopy',
                title: 'Centro de copiado con pedidos online',
                client: 'Jetcopy',
                category: Category::Institucional,
                url: 'https://jetcopy.com.ar/',
                summary: 'Sitio para centro de copiado de Mar del Plata: los clientes suben sus archivos, eligen cómo imprimirlos y los retiran.',
                description: 'Plataforma para Jetcopy, centro de copiado de Mar del Plata, que permite hacer pedidos de impresión online: el cliente sube su archivo, elige las opciones y pasa a retirarlo.',
                features: [
                    'Subida de archivos para imprimir',
                    'Catálogo de trabajos publicados',
                    'Cuentas de cliente y carrito de pedidos',
                    'Información de la empresa y contacto',
                ],
                image: 'jetcopy.webp',
                logo: 'jetcopy.png',
            ),
            new self(
                slug: 'travel-lab',
                title: 'Sitio para empresa de viajes y turismo',
                client: 'Travel Lab',
                category: Category::Institucional,
                url: 'https://travel-lab.tur.ar/',
                summary: 'Sitio institucional de Travel Lab (Mardeltour SRL), empresa de viajes y turismo desde 1989.',
                description: 'Sitio para Travel Lab, empresa de viajes y turismo de Mar del Plata. Presenta la agencia, su equipo de expertos y los viajes realizados, con novedades y un canal de consultas.',
                features: [
                    'Presentación de la agencia y su equipo',
                    'Galería de viajes',
                    'Novedades',
                    'Consultas y reclamos',
                    'Habilitaciones y datos legales',
                ],
                stack: ['PHP', 'CodeIgniter', 'Bootstrap', 'jQuery'],
                image: 'travel-lab.webp',
                logo: 'travel-lab.png',
                logoBg: '#1A1A1A',
            ),
            new self(
                slug: 'florecer-skills',
                title: 'Sitio bilingüe para organización de apoyo a la autonomía',
                client: 'Florecer',
                category: Category::Institucional,
                url: 'https://florecerskills.com/',
                summary: 'Organización que acompaña a personas con discapacidades del desarrollo en su camino hacia la vida independiente.',
                description: 'Sitio institucional en español e inglés para Florecer, que brinda entrenamiento y apoyo personalizado a adultos con discapacidades del desarrollo. Presenta sus programas, recibe postulaciones laborales y suma herramientas de accesibilidad.',
                features: [
                    'Sitio bilingüe español / inglés',
                    'Programas y servicios',
                    'Sección de empleo y formulario para postulantes',
                    'Blog',
                    'Herramientas de accesibilidad (tamaño de texto, alto contraste)',
                ],
                stack: ['WordPress', 'Elementor'],
                image: 'florecer-skills.webp',
                logo: 'florecer-skills.png',
            ),
            new self(
                slug: 'biblioteca-rafael-obligado',
                title: 'Sitio para biblioteca popular',
                client: 'Biblioteca Popular Rafael Obligado',
                category: Category::Institucional,
                url: 'https://bibliotecapopularrafaelobligado.com.ar/',
                summary: 'Sitio de la Biblioteca Popular Rafael Obligado de San Pedro, con catálogo, hemeroteca y asociación online.',
                description: 'Sitio institucional para la Biblioteca Popular Rafael Obligado, de San Pedro (Buenos Aires), activa desde 1872. Cuenta su historia, muestra el catálogo y la hemeroteca y explica paso a paso cómo asociarse.',
                features: [
                    'Historia e institución',
                    'Catálogo y hemeroteca',
                    'Cómo asociarse: paso a paso, formas de pago y beneficios',
                    'Novedades',
                ],
                stack: ['WordPress', 'Elementor'],
                image: 'biblioteca-rafael-obligado.webp',
                logo: 'biblioteca-rafael-obligado.png',
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

    /** Un proyecto por cliente, para la grilla de logos. @return list<self> */
    public static function clients(): array
    {
        $seen = [];
        return array_values(array_filter(self::all(), static function (self $p) use (&$seen): bool {
            if ($p->logo === '' || isset($seen[$p->client])) {
                return false;
            }
            return $seen[$p->client] = true;
        }));
    }

    /** Dominio sin "www.", para mostrar en la barra del navegador. */
    public function host(): string
    {
        $host = (string) parse_url($this->url, PHP_URL_HOST);
        return str_starts_with($host, 'www.') ? substr($host, 4) : $host;
    }

    /** Otros proyectos para sugerir al final del detalle (prioriza la misma categoría). */
    public function related(int $limit = 2): array
    {
        $others = array_values(array_filter(self::all(), fn (self $p): bool => $p->slug !== $this->slug));
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
