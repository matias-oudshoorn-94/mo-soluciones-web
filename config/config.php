<?php

declare(strict_types=1);

/*
 * Configuración general del sitio.
 * Editá estos valores con tus datos reales antes de publicar.
 */
return [
    'app' => [
        'name'     => 'Mo Soluciones Web',
        'url'      => 'https://mosolucionesweb.com', // sin barra final
        'debug'    => false,
        'timezone' => 'America/Argentina/Buenos_Aires',
        'locale'   => 'es',
    ],

    'contact' => [
        'email'     => 'hola@mosolucionesweb.com',
        'phone'     => '+54 9 11 0000-0000',
        'whatsapp'  => '5491100000000', // solo números, con código de país
        'location'  => 'Argentina · Trabajo remoto',
        'hours'     => 'Lunes a viernes · 9 a 18 h',
    ],

    'social' => [
        'linkedin'  => 'https://www.linkedin.com/',
        'instagram' => 'https://www.instagram.com/',
        'github'    => 'https://github.com/',
    ],

    'mail' => [
        // Dirección que recibe los mensajes del formulario de contacto.
        'to'      => 'hola@mosolucionesweb.com',
        // Remitente usado por mail(). Usá una casilla de tu dominio.
        'from'    => 'no-reply@mosolucionesweb.com',
        'subject' => 'Nueva consulta desde la web',
    ],
];
