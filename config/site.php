<?php

/*
|--------------------------------------------------------------------------
| Configuración global del sitio (chrome)
|--------------------------------------------------------------------------
| Valores POR DEFECTO de las partes globales de la web (marca, cabecera,
| menú, pie y cookies). El helper site() devuelve primero el valor guardado
| en `settings` (editable por el community manager desde el panel
| "Configuración del sitio") y, si no existe, cae a estos valores. Así la
| web nunca se queda en blanco aunque un ajuste no esté definido.
*/

return [

    // -------- Marca / branding --------
    'brand_text'    => 'SANZAHRA',   // logo en texto (si no hay imagen)
    'brand_logo'    => null,         // ruta de imagen de logo (opcional, sustituye al texto)
    'favicon'       => 'assets/favicon.svg',
    'loader_text'   => 'SANZAHRA',
    'title_suffix'  => 'SANZAHRA',   // sufijo del <title>: "Página — SANZAHRA"

    // -------- Cabecera / menú --------
    'nav_transparent'  => true,

    'header_menu_left' => [
        ['label' => 'Inicio',         'url' => '/'],
        ['label' => 'Sobre Nosotros', 'url' => 'sobre-nosotros'],
        ['label' => 'Servicios',      'url' => 'servicios', 'children' => [
            ['label' => 'Ver todos',              'url' => 'servicios'],
            ['label' => 'Moda',                   'url' => 'moda'],
            ['label' => 'Branding',               'url' => 'branding'],
            ['label' => 'Producción de Eventos',  'url' => 'event-producer'],
            ['label' => 'Interiorismo',           'url' => 'interiorismo'],
            ['label' => 'Asistencia Ejecutiva',   'url' => 'asistencia-ejecutiva'],
            ['label' => 'Arquitectura',           'url' => 'arquitectura'],
        ]],
        ['label' => 'Portfolio',      'url' => 'portfolio'],
    ],

    // Menú móvil (lista plana curada). Si se deja vacío, se genera
    // automáticamente a partir de los menús izquierdo + derecho.
    'header_menu_mobile' => [
        ['label' => 'Inicio',                'url' => '/'],
        ['label' => 'Sobre Nosotros',        'url' => 'sobre-nosotros'],
        ['label' => 'Servicios',             'url' => 'servicios'],
        ['label' => 'Portfolio',             'url' => 'portfolio'],
        ['label' => 'Moda',                  'url' => 'moda'],
        ['label' => 'Branding',              'url' => 'branding'],
        ['label' => 'Producción de Eventos', 'url' => 'event-producer'],
        ['label' => 'Interiorismo',          'url' => 'interiorismo'],
        ['label' => 'Asistencia Ejecutiva',  'url' => 'asistencia-ejecutiva'],
        ['label' => 'Arquitectura',          'url' => 'arquitectura'],
        ['label' => 'Contacto',              'url' => 'contacto'],
    ],

    'header_menu_right' => [
        ['label' => 'Moda', 'url' => 'moda', 'children' => [
            ['label' => 'Marcas propias',       'url' => 'moda#marcas-propias'],
            ['label' => 'Colaboraciones',       'url' => 'moda#colaboraciones'],
            ['label' => 'Talento',              'url' => 'moda#talento'],
            ['label' => 'Identidad de marcas',  'url' => 'moda#identidad'],
        ]],
        ['label' => 'Branding',              'url' => 'branding'],
        ['label' => 'Producción de Eventos', 'url' => 'event-producer'],
        ['label' => 'Interiorismo',          'url' => 'interiorismo'],
        ['label' => 'Contacto',              'url' => 'contacto'],
    ],

    // -------- Pie / footer --------
    'footer_tagline'  => 'Empresa matriz creativa multidisciplinar. Moda, branding, producción de eventos e interiorismo bajo una misma visión.',

    'footer_columns' => [
        ['heading' => 'Navegación', 'links' => [
            ['label' => 'Inicio',         'url' => '/'],
            ['label' => 'Sobre Nosotros', 'url' => 'sobre-nosotros'],
            ['label' => 'Servicios',      'url' => 'servicios'],
            ['label' => 'Portfolio',      'url' => 'portfolio'],
            ['label' => 'Contacto',       'url' => 'contacto'],
        ]],
        ['heading' => 'Servicios', 'links' => [
            ['label' => 'Branding',             'url' => 'branding'],
            ['label' => 'Interiorismo',         'url' => 'interiorismo'],
            ['label' => 'Moda',                 'url' => 'moda'],
            ['label' => 'Arquitectura',         'url' => 'arquitectura'],
            ['label' => 'Event Producer',       'url' => 'event-producer'],
            ['label' => 'Asistencia Ejecutiva', 'url' => 'asistencia-ejecutiva'],
        ]],
    ],

    'footer_copyright'   => '© {year} SANZAHRA. Todos los derechos reservados.',

    'footer_legal_links' => [
        ['label' => 'Política de Privacidad',   'url' => 'politica-privacidad'],
        ['label' => 'Términos y Condiciones',   'url' => 'terminos-condiciones'],
    ],

    // -------- Contacto / redes --------
    'contacto_email'     => 'info@sanzahra.com',
    'contacto_telefono'  => '+34 646 63 95 58',
    'contacto_direccion' => 'Calle Córdoba 6, 29001 Málaga',
    'redes_instagram'    => '',
    'redes_linkedin'     => '',
    'redes_facebook'     => '',

    // -------- Cookies --------
    'cookie_title'  => 'Utilizamos cookies',
    'cookie_text'   => 'Usamos cookies para mejorar tu experiencia, analizar el tráfico y personalizar contenido. Puedes aceptar todas o rechazarlas.',
    'cookie_accept' => 'Aceptar',
    'cookie_reject' => 'Rechazar',
];
