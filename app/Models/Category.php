<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Categorías de proyectos del portfolio.
 */
enum Category: string
{
    case Ecommerce     = 'ecommerce';
    case Institucional = 'institucional';
    case Sistemas      = 'sistemas';
    case Seo           = 'seo';

    public function label(): string
    {
        return match ($this) {
            self::Ecommerce     => 'E-commerce',
            self::Institucional => 'Sitio institucional',
            self::Sistemas      => 'Sistema de gestión',
            self::Seo           => 'SEO',
        };
    }
}
