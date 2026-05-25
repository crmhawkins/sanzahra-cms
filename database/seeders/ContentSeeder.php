<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSettings();
        $this->seedPageInicio();
        $this->seedPageSobreNosotros();
        $this->seedPageServicios();
        $this->seedPageModa();
        $this->seedPageBranding();
        $this->seedPageEventProducer();
        $this->seedPageInteriorismo();
        $this->seedPageAsistenciaEjecutiva();
        $this->seedPageArquitectura();
        $this->seedPagePortfolio();
        $this->seedPageContacto();
        $this->seedPagePoliticaPrivacidad();
        $this->seedPageTerminosCondiciones();
    }

    private function page(string $slug, array $attrs): Page
    {
        return Page::updateOrCreate(['slug' => $slug], $attrs);
    }

    private function block(Page $page, string $key, string $type, string $label, array $data, int $order): Block
    {
        return Block::updateOrCreate(
            ['page_id' => $page->id, 'key' => $key],
            ['type' => $type, 'label' => $label, 'data' => $data, 'order' => $order, 'is_active' => true]
        );
    }

    private function setting(string $key, mixed $value, string $group = 'general', ?string $label = null): void
    {
        Setting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => $group, 'label' => $label]);
    }

    // -------------------------------------------------------------------------
    // Settings
    // -------------------------------------------------------------------------

    private function seedSettings(): void
    {
        $this->setting('contacto_email', 'info@sanzahra.com', 'contacto', 'Email de contacto');
        $this->setting('contacto_telefono', '+34 646 63 95 58', 'contacto', 'Teléfono');
        $this->setting('contacto_direccion', 'Calle Córdoba 6, 29001 Málaga', 'contacto', 'Dirección');
        $this->setting(
            'marquee_default',
            'MODA · BRANDING · PRODUCCIÓN DE EVENTOS · INTERIORISMO · PASARELAS · IDENTIDAD DE MARCAS',
            'general',
            'Texto marquee'
        );
        $this->setting('redes_instagram', '', 'redes', 'Instagram');
        $this->setting('redes_linkedin', '', 'redes', 'LinkedIn');
        $this->setting('redes_facebook', '', 'redes', 'Facebook');
    }

    // -------------------------------------------------------------------------
    // Inicio
    // -------------------------------------------------------------------------

    private function seedPageInicio(): void
    {
        $page = $this->page('inicio', [
            'title'            => 'Inicio',
            'meta_title'       => 'SANZAHRA — Creatividad multidisciplinar',
            'meta_description' => 'SANZAHRA — Interiorismo, Branding, Moda, Arquitectura y Asistencia Ejecutiva. Empresa matriz creativa multidisciplinar.',
            'layout'           => 'home',
            'is_active'        => true,
            'order'            => 1,
        ]);

        $this->block($page, 'hero_slider', 'hero_slider', 'Hero Slider', [
            'title'    => 'SANZAHRA',
            'subtitle' => 'Moda · Branding · Producción de Eventos · Interiorismo',
            'slides'   => [
                ['image' => 'assets/img/moda/moda-06.jpg',              'label' => 'Moda'],
                ['image' => 'assets/img/extra/extra-21-flores-coral.jpg','label' => 'Producción de Eventos'],
                ['image' => 'assets/img/branding/branding-05.jpg',       'label' => 'Branding'],
                ['image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&q=80', 'label' => 'Interiorismo'],
            ],
        ], 10);

        $this->block($page, 'marquee', 'marquee', 'Marquee', [
            'content' => 'MODA · BRANDING · PRODUCCIÓN DE EVENTOS · INTERIORISMO · PASARELAS · IDENTIDAD DE MARCAS',
        ], 20);

        $this->block($page, 'intro', 'intro_text', 'Introducción', [
            'section_label' => 'Sobre Nosotros',
            'title'         => 'Donde la creatividad<br>se convierte en experiencia',
            'paragraph_1'   => 'SANZAHRA es una empresa matriz creativa que integra moda, branding, producción de eventos e interiorismo bajo una misma visión. Creamos marcas, producimos pasarelas, diseñamos experiencias y construimos identidades que perduran.',
            'paragraph_2'   => 'Creemos en la fuerza de la estética, la precisión y la innovación como pilares de cada proyecto. Cada detalle cuenta una historia.',
            'image'         => 'assets/img/extra/extra-07.jpg',
            'button_text'   => 'Conoce más',
            'button_url'    => '/sobre-nosotros',
        ], 30);

        $this->block($page, 'image_break_1', 'image_break', 'Image Break 1', [
            'image'      => 'assets/img/extra/extra-13.jpg',
            'heading'    => 'Moda, cultura y experiencia',
            'subheading' => 'Donde cada detalle cuenta una historia',
        ], 40);

        $this->block($page, 'services_grid', 'services_grid', 'Grid de Servicios', [
            'section_label' => 'Nuestros Servicios',
            'title'         => 'Excelencia en cada disciplina',
            'services'      => [
                [
                    'number'      => '01',
                    'title'       => 'Moda',
                    'description' => 'Marcas propias, colaboraciones, talento e identidad de marcas de moda.',
                    'image'       => 'assets/img/extra/extra-10.jpg',
                    'url'         => '/moda',
                ],
                [
                    'number'      => '02',
                    'title'       => 'Branding & Marketing',
                    'description' => 'Identidad, narrativa y posicionamiento que transforman marcas en símbolos.',
                    'image'       => 'assets/img/extra/extra-11.jpg',
                    'url'         => '/branding',
                ],
                [
                    'number'      => '03',
                    'title'       => 'Producción de Eventos',
                    'description' => 'Galas, pasarelas, lanzamientos y activaciones que se viven antes de contarse.',
                    'image'       => 'assets/img/extra/extra-eventos-flores.jpg',
                    'url'         => '/event-producer',
                ],
                [
                    'number'      => '04',
                    'title'       => 'Interiorismo',
                    'description' => 'Espacios íntimos y hoteleros que se habitan como si fueran propios.',
                    'image'       => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&q=80',
                    'url'         => '/interiorismo',
                ],
                [
                    'number'      => '05',
                    'title'       => 'Asistencia Ejecutiva',
                    'description' => 'Concierge silencioso y exigente para quien no tiene tiempo que perder.',
                    'image'       => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80',
                    'url'         => '/asistencia-ejecutiva',
                ],
                [
                    'number'      => '06',
                    'title'       => 'Arquitectura',
                    'description' => 'Arquitectura conceptual, neuronal y efímera con vocación de permanecer.',
                    'image'       => 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=600&q=80',
                    'url'         => '/arquitectura',
                ],
            ],
        ], 50);

        $this->block($page, 'image_break_2', 'image_break', 'Image Break 2', [
            'image'      => 'assets/img/eventos/eventos-09.jpg',
            'heading'    => 'Cada proyecto, una nueva visión',
            'subheading' => 'Moda · Identidades · Experiencias',
        ], 60);

        $this->block($page, 'portfolio_teaser', 'portfolio_teaser', 'Portfolio Teaser', [
            'section_label' => 'Portfolio',
            'title'         => 'Proyectos seleccionados',
            'button_text'   => 'Ver todo el portfolio',
            'button_url'    => '/portfolio',
            'items'         => [
                ['image' => 'assets/img/extra/extra-01.jpg',   'title' => 'Pasarela La Florecilla',      'category' => 'Moda',                  'layout' => 'tall'],
                ['image' => 'assets/img/moda/moda-16.jpg',     'title' => 'Pasarela Internacional',      'category' => 'Producción de Eventos',  'layout' => 'wide'],
                ['image' => 'assets/img/moda/moda-08.jpg',     'title' => 'Producción de desfiles',      'category' => 'Producción de Eventos',  'layout' => 'wide'],
                ['image' => 'assets/img/branding/branding-07.jpg', 'title' => 'Campaña Editorial',      'category' => 'Moda',                  'layout' => 'normal'],
                ['image' => 'assets/img/extra/extra-04.jpg',   'title' => 'Manual de Marca Solenne',     'category' => 'Branding',              'layout' => 'normal'],
                ['image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&q=80', 'title' => 'Residencial villas Luxury', 'category' => 'Interiorismo', 'layout' => 'normal'],
            ],
        ], 70);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Hablemos',
            'title'         => '¿Tienes un proyecto<br>en mente?',
            'description'   => 'Estamos listos para escucharte. Cada gran proyecto empieza con una conversación.',
            'button_text'   => 'Contáctanos',
            'button_url'    => '/contacto',
        ], 80);
    }

    // -------------------------------------------------------------------------
    // Sobre Nosotros
    // -------------------------------------------------------------------------

    private function seedPageSobreNosotros(): void
    {
        $page = $this->page('sobre-nosotros', [
            'title'            => 'Sobre Nosotros',
            'meta_title'       => 'Sobre Nosotros — SANZAHRA',
            'meta_description' => 'Conoce SANZAHRA — una empresa matriz creativa multidisciplinar. Filosofía, visión y enfoque.',
            'layout'           => 'default',
            'is_active'        => true,
            'order'            => 2,
        ]);

        $this->block($page, 'hero_about', 'page_hero', 'Hero Sobre Nosotros', [
            'kicker'   => 'Sobre Nosotros',
            'brand'    => 'SANZAHRA',
            'subtitle' => 'Una visión, múltiples disciplinas. Creamos donde la estética se encuentra con la estrategia.',
        ], 10);

        $this->block($page, 'pull_quote', 'pull_quote', 'Pull Quote', [
            'quote' => 'Creemos que el verdadero lujo no grita: susurra. Vive en el detalle que pocos ven y todos sienten, en la coherencia silenciosa entre forma, espacio y propósito.',
        ], 20);

        $this->block($page, 'full_image', 'full_image', 'Imagen Completa', [
            'image' => 'assets/img/extra/extra-02.jpg',
        ], 30);

        $this->block($page, 'filosofia', 'two_column', 'Filosofía', [
            'section_label' => 'Filosofía',
            'title'         => 'La precisión es nuestra<br>forma de arte',
            'paragraph_1'   => 'Creemos que cada proyecto merece la misma dedicación sin importar su escala. Desde la concepción de una marca hasta la producción de una pasarela, aplicamos el mismo rigor estético y estratégico.',
            'paragraph_2'   => 'Nuestra multidisciplinariedad no es casualidad: es el resultado de entender que el lujo contemporáneo exige visiones integrales. Una marca de moda necesita algo más que una colección, un evento algo más que producción, una identidad algo más que un logo.',
            'image'         => 'assets/img/moda/moda-34-ilustraciones-rosa.jpg',
        ], 40);

        $this->block($page, 'stat_block', 'stat_block', 'Stat Block', [
            'number'      => '+50',
            'title'       => 'proyectos de experiencia<br>de nuestro equipo',
            'description' => 'Marcas de moda propias y ajenas, pasarelas y desfiles, identidades corporativas, colaboraciones editoriales y producciones internacionales. Cada cifra es, en realidad, una historia hecha a medida.',
        ], 50);

        $this->block($page, 'timeline', 'timeline', 'Timeline', [
            'section_label' => 'Nuestra historia',
            'title'         => 'Hitos del camino',
            'items'         => [
                ['year' => '2024', 'description' => 'Nace el proyecto conceptual de SANZAHRA en Ibiza como estudio-atelier multidisciplinar.'],
                ['year' => '2025', 'description' => 'Se crean los primeros trabajos de servicios de SANZAHRA arropado por empresas del grupo, y se forma el equipo para la constitución y fundación desde Ibiza, Málaga y Córdoba. Lanzamiento en redes sociales a nivel conceptual y primeros trabajos de Branding y Arquitectura.'],
                ['year' => '2026', 'description' => 'Nueva sede en el centro de Málaga y constitución de Sanzahra Atelier S.L. Lanzamiento de la web y consolidación de «La Florecilla» como marca propia conceptual.'],
            ],
        ], 60);

        $this->block($page, 'equipo', 'team_grid', 'Equipo', [
            'section_label' => 'Equipo',
            'title'         => 'Las personas<br>detrás de la marca',
            'team'          => [
                ['initials' => 'T', 'name' => 'Tamara Moreno Luna', 'role' => 'Moda y Marketing'],
                ['initials' => 'F', 'name' => 'Florencio Pérez',    'role' => 'Creatividad'],
                ['initials' => 'A', 'name' => 'Antonio Ariza',      'role' => 'Gestión'],
            ],
        ], 70);

        $this->block($page, 'valores', 'features_row', 'Valores', [
            'section_label' => 'Nuestros Valores',
            'title'         => 'Lo que nos define',
            'features'      => [
                ['title' => 'Excelencia',   'description' => 'La calidad no es negociable. Estándares exigentes en cada entrega.'],
                ['title' => 'Visión',       'description' => 'Diseñamos para perdurar, no para seguir tendencias pasajeras.'],
                ['title' => 'Integralidad', 'description' => 'Unimos disciplinas bajo una sola dirección creativa coherente.'],
                ['title' => 'Discreción',   'description' => 'Confidencialidad absoluta. El resultado importa más que el ruido.'],
            ],
        ], 80);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Trabaja con nosotros',
            'title'         => '¿Listo para empezar?',
            'description'   => 'Cada proyecto comienza con una conversación sincera. Cuéntanos tu idea y construyamos algo extraordinario juntos.',
            'button_text'   => 'Escríbenos',
            'button_url'    => '/contacto',
        ], 90);
    }

    // -------------------------------------------------------------------------
    // Servicios
    // -------------------------------------------------------------------------

    private function seedPageServicios(): void
    {
        $page = $this->page('servicios', [
            'title'            => 'Servicios',
            'meta_title'       => 'Servicios — SANZAHRA',
            'meta_description' => 'Servicios SANZAHRA — Branding, Interiorismo, Moda, Arquitectura, Event Producer y Asistencia Ejecutiva.',
            'layout'           => 'default',
            'is_active'        => true,
            'order'            => 3,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Servicios', [
            'kicker'          => 'Nuestros Servicios',
            'title'           => 'Soluciones creativas<br>a medida',
            'subtitle'        => 'Seis disciplinas integradas bajo una misma visión. Trabajamos solos o en conjunto, según el proyecto lo requiera.',
            'background_image'=> 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1920&q=80',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio', 'url' => '/'],
                ['label' => 'Servicios', 'url' => null],
            ],
        ], 20);

        $this->block($page, 'intro_vision', 'intro_text', 'Intro Visión', [
            'section_label' => 'Visión integral',
            'title'         => 'Todo lo que tu marca<br>necesita, en un solo lugar',
            'paragraph_1'   => 'SANZAHRA integra seis disciplinas que habitualmente requerirían distintos proveedores. Esto garantiza coherencia creativa, ahorro de tiempo y una única interlocución para todo tu proyecto.',
        ], 30);

        $this->block($page, 'service_rows', 'service_rows', 'Filas de Servicios', [
            'services' => [
                [
                    'number'      => '01',
                    'title'       => 'Moda',
                    'description' => 'Creación de marcas propias, colaboraciones con diseñadores, captación de talento y construcción de identidad para firmas de moda. La moda como forma de cultura contemporánea.',
                    'bullets'     => ['Marcas propias y colaboraciones', 'Producción de pasarelas y editoriales', 'Captación de talento emergente', 'Identidad visual para firmas de moda'],
                    'image'       => 'assets/img/extra/extra-05.jpg',
                    'url'         => '/moda',
                    'reverse'     => false,
                ],
                [
                    'number'      => '02',
                    'title'       => 'Branding & Marketing',
                    'description' => 'Construimos marcas con alma: desde la estrategia y el naming hasta el sistema visual completo, el tono de voz y la narrativa que las sostiene en el tiempo.',
                    'bullets'     => ['Estrategia de marca y posicionamiento', 'Naming, identidad visual y manual', 'Dirección de arte y campañas', 'Contenido y redes sociales'],
                    'image'       => 'assets/img/branding/branding-02.jpg',
                    'url'         => '/branding',
                    'reverse'     => true,
                ],
                [
                    'number'      => '03',
                    'title'       => 'Producción de Eventos',
                    'description' => 'Producción integral de pasarelas, desfiles y eventos de moda. Del casting a la última luz: dirección creativa, escenografía, técnica y show.',
                    'bullets'     => ['Pasarelas y desfiles de moda', 'Presentaciones de colección', 'Lanzamientos de marca de moda', 'Editoriales en vivo'],
                    'image'       => 'assets/img/eventos/eventos-13-pasarela-flores.jpg',
                    'url'         => '/event-producer',
                    'reverse'     => false,
                ],
                [
                    'number'      => '04',
                    'title'       => 'Interiorismo',
                    'description' => 'Espacios que cuentan historias. Trabajamos residencias privadas de alta gama, hotelería 5 estrellas y locales comerciales donde cada material y cada luz está elegido con intención.',
                    'bullets'     => ['Residencial de lujo', 'Hotelería y restauración', 'Retail y showrooms', 'Espacios efímeros y pop-up'],
                    'image'       => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&q=80',
                    'url'         => '/interiorismo',
                    'reverse'     => true,
                ],
                [
                    'number'      => '05',
                    'title'       => 'Asistencia Ejecutiva',
                    'description' => 'Concierge ejecutivo de alto nivel para directivos, familias y patrimonio privado. Discreción absoluta, disponibilidad total y anticipación a cada necesidad.',
                    'bullets'     => ['Gestión de agenda y viajes', 'Coordinación de equipos personales', 'Gestión de patrimonio y propiedades', 'Lifestyle management'],
                    'image'       => 'assets/img/branding/branding-04.jpg',
                    'url'         => '/asistencia-ejecutiva',
                    'reverse'     => false,
                ],
                [
                    'number'      => '06',
                    'title'       => 'Arquitectura',
                    'description' => 'Proyectos arquitectónicos donde forma y función se equilibran con precisión. Desarrollados en colaboración con <a href="https://sumnomatec.com" target="_blank" rel="noopener" style="color:inherit; border-bottom:1px solid currentColor;">Sumnomatec</a>, nuestro partner de arquitectura.',
                    'bullets'     => ['Sedes corporativas y oficinas', 'Viviendas unifamiliares', 'Pabellones y arquitectura efímera', 'Rehabilitación y patrimonio'],
                    'image'       => 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=900&q=80',
                    'url'         => '/arquitectura',
                    'reverse'     => true,
                ],
            ],
        ], 40);

        $this->block($page, 'ventajas', 'features_row', 'Ventajas', [
            'section_label' => 'Por qué SANZAHRA',
            'title'         => 'Ventajas de trabajar<br>con nosotros',
            'features'      => [
                ['title' => 'Un solo interlocutor', 'description' => 'Olvídate de coordinar entre agencias. Te acompañamos en todas las fases con un único project manager.'],
                ['title' => 'Coherencia visual',    'description' => 'Al crear bajo el mismo techo, garantizamos una estética unificada en todos los puntos de contacto de tu marca.'],
                ['title' => 'Agilidad real',        'description' => 'Los plazos se acortan cuando los equipos trabajan en la misma sala. Tomamos decisiones en horas, no en semanas.'],
            ],
        ], 50);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Empecemos',
            'title'         => 'Cuéntanos<br>tu proyecto',
            'description'   => 'Solicita una consulta inicial gratuita. Estudiamos tu caso y te proponemos el enfoque más adecuado.',
            'button_text'   => 'Contactar',
            'button_url'    => '/contacto',
        ], 60);
    }

    // -------------------------------------------------------------------------
    // Moda
    // -------------------------------------------------------------------------

    private function seedPageModa(): void
    {
        $page = $this->page('moda', [
            'title'            => 'Moda',
            'meta_title'       => 'Moda — SANZAHRA',
            'meta_description' => 'Moda SANZAHRA — Creación y producción de marcas, organización de desfiles y eventos de moda, formación y captación de nuevos talentos.',
            'layout'           => 'default',
            'is_active'        => true,
            'order'            => 4,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Moda', [
            'kicker'           => 'Moda',
            'title'            => 'La moda<br>como forma de cultura',
            'subtitle'         => 'Creación de marcas, producción de desfiles y gestión de talento. Vestir ideas antes que cuerpos.',
            'background_image' => 'assets/img/moda/moda-24-editorial-bw.jpg',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio',    'url' => '/'],
                ['label' => 'Servicios', 'url' => '/servicios'],
                ['label' => 'Moda',      'url' => null],
            ],
        ], 20);

        $this->block($page, 'intro', 'intro_text', 'Intro Moda', [
            'section_label' => 'Moda y cultura',
            'title'         => 'Vestir ideas,<br>no tendencias',
            'paragraph_1'   => 'La moda es un lenguaje: dice quiénes somos antes incluso de que hablemos. En SANZAHRA abordamos la moda como una forma de cultura contemporánea, más cerca del arte y la antropología que del mero consumo.',
            'paragraph_2'   => 'Creamos marcas propias, producimos eventos de moda como experiencias narrativas y acompañamos a la nueva generación de diseñadores a través de nuestro programa de captación de talento.',
            'image'         => 'assets/img/moda/moda-23-ilustraciones.jpg',
        ], 30);

        $this->block($page, 'marcas_propias', 'marcas_propias', 'Marcas Propias', [
            'section_label' => 'Marcas propias',
            'title'         => 'Construimos universos<br>de marca completos',
            'description'   => 'Creamos marcas de moda desde cero: concepto, identidad, diseño, producción y lanzamiento. Cada marca propia de SANZAHRA nace con una voz propia y una historia clara que contar.',
            'brands'        => [
                [
                    'name'        => 'La Florecilla',
                    'description' => 'Nuestra primera marca propia de moda. Un proyecto cuidadosamente construido desde el detalle, que muy pronto tendrá su propia historia que contar.',
                    'status'      => 'coming_soon',
                    'modal_image' => 'assets/img/extra/extra-15-rosa.jpg',
                ],
            ],
        ], 40);

        $this->block($page, 'colaboraciones', 'two_column', 'Colaboraciones', [
            'section_label' => 'Colaboraciones',
            'title'         => 'Diseñadores,<br>firmas e instituciones',
            'paragraph_1'   => 'Colaboramos con marcas consolidadas, diseñadores emergentes y proyectos culturales que comparten nuestra visión. Aportamos dirección creativa, producción y comunicación a colecciones cápsula, capsulas editoriales, campañas compartidas y presentaciones conjuntas.',
            'paragraph_2'   => 'Cada colaboración se diseña como un proyecto único: desde el brief inicial hasta la pieza final, cuidando la coherencia estética y la narrativa que hay detrás.',
            'image'         => 'assets/img/moda/moda-36-joyeria-glitch2.jpg',
        ], 50);

        $this->block($page, 'image_break', 'image_break', 'Image Break', [
            'image'      => 'assets/img/extra/extra-18-flores-escultura.jpg',
            'heading'    => 'La moda no viste: narra',
            'subheading' => 'Cultura, cuerpo y contemporaneidad',
        ], 60);

        $this->block($page, 'talento_form', 'talento_form', 'Formulario Talento', [
            'section_label' => 'Captación de talento',
            'title'         => 'Buscamos la<br>próxima generación',
            'description'   => '¿Eres diseñador, modelo, estilista o creativo emergente? Estamos siempre atentos a nuevas voces. Envíanos tu portfolio o tu candidatura y nuestro equipo te contactará si hay una oportunidad que encaje.',
            'image'         => 'assets/img/moda/moda-37-anillos-guantes2.jpg',
            'fields'        => ['nombre', 'email', 'telefono', 'perfil', 'portfolio', 'mensaje'],
        ], 70);

        $this->block($page, 'identidad_tags', 'identidad_tags', 'Identidad de Marcas', [
            'section_label' => 'Identidad de marcas',
            'title'         => 'Branding pensado<br>para la moda',
            'paragraph_1'   => 'Trabajamos la identidad visual de firmas de moda, diseñadores independientes y boutiques: naming, logotipos, paletas, tipografías, sistemas gráficos, packaging y presencia digital. Todo pensado para que la marca tenga la misma voz coherente desde la etiqueta hasta la campaña.',
            'paragraph_2'   => 'Cuando una identidad está bien construida, se reconoce en el primer golpe de vista. Y eso cambia por completo cómo el mercado percibe una marca de moda.',
            'image'         => 'assets/img/moda/moda-25-bocetos.jpg',
            'tags'          => ['Naming', 'Logo y símbolo', 'Sistema visual', 'Packaging', 'Presencia digital', 'Lookbooks'],
        ], 80);

        $this->block($page, 'desfiles_cta', 'desfiles_cta', 'Desfiles CTA', [
            'section_label'  => 'Eventos y desfiles',
            'title'          => 'Desfiles',
            'description'    => 'Un programa propio de eventos de moda pensado para dar visibilidad a creadores emergentes y celebrar el talento nacional. Pasarelas, encuentros y experiencias inmersivas que unen moda, música y arte contemporáneo.',
            'image_break'    => 'assets/img/eventos/eventos-14-pasarela-flores.jpg',
            'break_heading'  => 'Una pasarela hecha de flores',
            'break_sub'      => 'Próximo evento SANZAHRA',
            'badge'          => 'Próximamente',
        ], 90);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Hablemos',
            'title'         => '¿Tienes un proyecto<br>de moda en mente?',
            'description'   => 'Creación de marca, desfile, evento o colaboración: cuéntanos tu idea y te proponemos el enfoque más adecuado.',
            'button_text'   => 'Contactar',
            'button_url'    => '/contacto',
        ], 100);
    }

    // -------------------------------------------------------------------------
    // Branding
    // -------------------------------------------------------------------------

    private function seedPageBranding(): void
    {
        $page = $this->page('branding', [
            'title'            => 'Branding & Marketing',
            'meta_title'       => 'Branding & Marketing — SANZAHRA',
            'meta_description' => 'Branding y Marketing SANZAHRA — Construimos identidades de marca que perduran. Estrategia, identidad visual, naming y comunicación digital.',
            'layout'           => 'default',
            'is_active'        => true,
            'order'            => 5,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Branding', [
            'kicker'           => 'Branding & Marketing',
            'title'            => 'La marca<br>como arquitectura',
            'subtitle'         => 'Construimos identidades que perduran. Estrategia, símbolo y narrativa al servicio de una visión.',
            'background_image' => 'assets/img/branding/branding-05.jpg',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio',    'url' => '/'],
                ['label' => 'Servicios', 'url' => '/servicios'],
                ['label' => 'Branding',  'url' => null],
            ],
        ], 20);

        $this->block($page, 'intro', 'intro_text', 'Intro Branding', [
            'section_label' => 'Identidad y estrategia',
            'title'         => 'Marcas que se<br>recuerdan',
            'paragraph_1'   => 'Una marca no es un logotipo: es una arquitectura. Es la suma de decisiones, símbolos y silencios que configuran la manera en que el mundo te percibe. En SANZAHRA diseñamos esa arquitectura desde el fundamento, con la paciencia de quien sabe que lo duradero no se improvisa.',
            'paragraph_2'   => 'Trabajamos desde el concepto estratégico hasta la ejecución visual, atendiendo cada punto de contacto con el mismo nivel de cuidado. El resultado son marcas coherentes, memorables y profundamente humanas.',
            'image'         => 'assets/img/branding/branding-08.jpg',
            'tags'          => ['Identidad Visual', 'Estrategia de Marca', 'Naming', 'Manual de marca', 'Comunicación digital', 'Contenido editorial', 'Publicidad'],
        ], 30);

        $this->block($page, 'features', 'features_row', 'Qué incluye', [
            'section_label' => 'Qué incluye',
            'title'         => 'Un sistema<br>completo de marca',
            'features'      => [
                ['title' => 'Identidad coherente',    'description' => 'Un sistema visual y verbal unificado, diseñado para sostener la marca en cada canal y formato, desde lo editorial hasta lo digital.'],
                ['title' => 'Posicionamiento claro',  'description' => 'Definimos el lugar que tu marca ocupa en la mente del público. Un territorio propio, reconocible y defendible frente a la competencia.'],
                ['title' => 'Narrativa de marca',     'description' => 'Construimos el relato que conecta con tus audiencias. Una historia auténtica, con voz propia, capaz de trascender campañas y temporadas.'],
            ],
        ], 40);

        $this->block($page, 'image_break', 'image_break', 'Image Break', [
            'image'      => 'assets/img/extra/extra-16.jpg',
            'heading'    => 'Una marca no se diseña: se construye',
            'subheading' => 'Con tiempo, con criterio y con visión',
        ], 50);

        $this->block($page, 'proceso', 'process_grid', 'Proceso', [
            'section_label' => 'Nuestro proceso',
            'title'         => 'De la intuición<br>al sistema',
            'steps'         => [
                ['number' => '01', 'title' => 'Discovery',       'description' => 'Escuchamos, investigamos y entendemos el contexto, la historia y las aspiraciones de la marca.'],
                ['number' => '02', 'title' => 'Estrategia',      'description' => 'Definimos el posicionamiento, el territorio conceptual y los pilares narrativos que sostendrán la identidad.'],
                ['number' => '03', 'title' => 'Diseño',          'description' => 'Traducimos la estrategia en un sistema visual y verbal: logotipo, tipografía, color, voz y códigos propios.'],
                ['number' => '04', 'title' => 'Implementación',  'description' => 'Desplegamos la marca en todos los puntos de contacto y entregamos las herramientas para su uso coherente.'],
            ],
        ], 60);

        $this->block($page, 'gallery', 'gallery', 'Galería', [
            'section_label' => 'Trabajos seleccionados',
            'title'         => 'Identidades<br>recientes',
            'items'         => [
                ['image' => 'assets/img/moda/moda-39-modelo-flores-rojas.jpg'],
                ['image' => 'assets/img/moda/moda-34-ilustraciones-rosa.jpg'],
                ['image' => 'assets/img/moda/moda-25-bocetos.jpg'],
            ],
        ], 70);

        $this->block($page, 'partner', 'partner', 'Partner Hawkins', [
            'section_label' => 'Partner estratégico',
            'title'         => 'En colaboración con<br>Hawkins',
            'description'   => 'Nuestra división de branding y marketing se desarrolla en colaboración con <strong>Hawkins</strong>, agencia de referencia en estrategia de marca, marketing digital y comunicación. Una alianza que une la visión creativa de SANZAHRA con la experiencia de una agencia consolidada en el sector.',
            'button_text'   => 'Visitar hawkins.es →',
            'button_url'    => 'https://hawkins.es',
        ], 80);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Empecemos',
            'title'         => 'Construyamos<br>tu marca',
            'description'   => 'Solicita una consulta inicial gratuita. Estudiamos tu caso y te proponemos el enfoque más adecuado para tu proyecto de marca.',
            'button_text'   => 'Contactar',
            'button_url'    => '/contacto',
        ], 90);
    }

    // -------------------------------------------------------------------------
    // Event Producer
    // -------------------------------------------------------------------------

    private function seedPageEventProducer(): void
    {
        $page = $this->page('event-producer', [
            'title'            => 'Producción de Eventos',
            'meta_title'       => 'Event Producer — SANZAHRA',
            'meta_description' => 'Event Producer SANZAHRA — Producción integral de eventos corporativos, galas, lanzamientos, stands y activaciones de marca.',
            'layout'           => 'default',
            'is_active'        => true,
            'order'            => 6,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Eventos', [
            'kicker'           => 'Producción de Eventos',
            'title'            => 'Pasarela<br>de Moda',
            'subtitle'         => 'Producción integral de pasarelas, desfiles y eventos de moda. Del casting a la última luz, del croquis al aplauso final.',
            'background_image' => 'assets/img/eventos/eventos-13-pasarela-flores.jpg',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio',                 'url' => '/'],
                ['label' => 'Servicios',              'url' => '/servicios'],
                ['label' => 'Producción de Eventos',  'url' => null],
            ],
        ], 20);

        $this->block($page, 'intro', 'intro_text', 'Intro Eventos', [
            'section_label' => 'Disciplina',
            'title'         => 'Experiencias<br>que se recuerdan',
            'paragraph_1'   => 'Un desfile no es solo el paseo de una colección: es el momento en el que una marca dice quién es. En SANZAHRA producimos pasarelas, presentaciones y eventos de moda concebidos como experiencias narrativas completas, donde cada modelo, cada luz y cada segundo cuenta la misma historia.',
            'paragraph_2'   => 'Nos especializamos exclusivamente en el universo de la moda: pasarelas, desfiles, editoriales en vivo, presentaciones de colección y lanzamientos de marca. Coordinamos dirección creativa, casting, escenografía, técnica, música y comunicación bajo una sola mirada.',
            'image'         => 'assets/img/moda/moda-24-editorial-bw.jpg',
            'tags'          => ['Pasarelas', 'Desfiles', 'Presentaciones de colección', 'Lanzamientos de marca', 'Editoriales en vivo'],
        ], 30);

        $this->block($page, 'features', 'features_row', 'Qué hacemos', [
            'section_label' => 'Qué hacemos',
            'title'         => 'Del croquis<br>al aplauso final',
            'features'      => [
                ['title' => 'Pasarelas y desfiles',        'description' => 'Producción integral de pasarelas para marcas consolidadas, emergentes y marcas propias. Dirección creativa, casting, coreografía y técnica.'],
                ['title' => 'Presentaciones de colección', 'description' => 'Formatos alternativos al desfile tradicional: static shows, fashion films, presentaciones inmersivas y performances editoriales.'],
                ['title' => 'Lanzamientos de marca',       'description' => 'Eventos de lanzamiento para marcas de moda: fiestas de presentación, pop-ups experienciales y activaciones editoriales.'],
            ],
        ], 40);

        $this->block($page, 'image_break', 'image_break', 'Image Break', [
            'image'      => 'assets/img/eventos/eventos-14-pasarela-flores.jpg',
            'heading'    => '«Una pasarela no se improvisa:<br>se dirige»',
            'subheading' => 'Cada paso es una decisión creativa',
        ], 50);

        $this->block($page, 'proceso', 'process_grid', 'Proceso', [
            'section_label' => 'Nuestro proceso',
            'title'         => 'Cómo trabajamos',
            'steps'         => [
                ['number' => '01', 'title' => 'Concepto',              'description' => 'Dirección creativa, narrativa del desfile, mood y universo visual que dará forma a la experiencia.'],
                ['number' => '02', 'title' => 'Casting y coreografía', 'description' => 'Selección de modelos, prueba de estilismo, orden de salida y coreografía específica para cada look.'],
                ['number' => '03', 'title' => 'Escenografía y técnica','description' => 'Diseño de pasarela, iluminación, música, sonido y backstage. Todo lo que se ve y lo que no.'],
                ['number' => '04', 'title' => 'Show time',             'description' => 'Dirección el día del desfile: control absoluto desde backstage. De la primera salida al saludo final.'],
            ],
        ], 60);

        $this->block($page, 'gallery', 'gallery', 'Galería', [
            'section_label' => 'Visual',
            'title'         => 'Inspiración',
            'items'         => [
                ['image' => 'assets/img/eventos/eventos-16-vestido-blanco-pasarela.jpg'],
                ['image' => 'assets/img/eventos/eventos-15-pasarela-flores2.jpg'],
                ['image' => 'assets/img/moda/moda-29-editorial-blur.jpg'],
            ],
        ], 70);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Empecemos',
            'title'         => '¿Tienes una pasarela<br>o desfile en mente?',
            'description'   => 'Cuéntanos tu colección, la fecha y tu visión. Te propondremos un concepto a medida.',
            'button_text'   => 'Contactar',
            'button_url'    => '/contacto',
        ], 80);
    }

    // -------------------------------------------------------------------------
    // Interiorismo
    // -------------------------------------------------------------------------

    private function seedPageInteriorismo(): void
    {
        $page = $this->page('interiorismo', [
            'title'            => 'Interiorismo',
            'meta_title'       => 'Interiorismo — SANZAHRA',
            'meta_description' => 'Interiorismo SANZAHRA — Proyectos residenciales de alta gama, hotelería boutique y 5 estrellas, y producción de stands.',
            'layout'           => 'default',
            'is_active'        => true,
            'order'            => 7,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Interiorismo', [
            'kicker'           => 'Interiorismo',
            'title'            => 'Los espacios<br>hablan de nosotros',
            'subtitle'         => 'Proyectos residenciales de alta gama, hotelería boutique y 5 estrellas, y producción de stands con alma.',
            'background_image' => 'https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=1920&q=80',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio',        'url' => '/'],
                ['label' => 'Servicios',     'url' => '/servicios'],
                ['label' => 'Interiorismo',  'url' => null],
            ],
        ], 20);

        $this->block($page, 'intro', 'intro_text', 'Intro Interiorismo', [
            'section_label' => 'Diseño de espacios',
            'title'         => 'El espacio<br>como retrato',
            'paragraph_1'   => 'Un espacio bien diseñado no se impone: se habita. Cuenta quién vive, quién recibe, quién trabaja dentro de él. En SANZAHRA concebimos el interiorismo como un ejercicio de escucha: entender la vida que sucederá entre esas paredes antes de proponer un solo material.',
            'paragraph_2'   => 'Desde residencias privadas de alta gama hasta hoteles boutique y cinco estrellas, pasando por producción y construcción de stands, cada proyecto se aborda con rigor técnico y sensibilidad estética.',
            'image'         => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?w=800&q=80',
            'tags'          => ['Residencial', 'Hotelería boutique', 'Hotelería 5 estrellas', 'Stand Builder', 'Event Producer', 'Retail'],
        ], 30);

        $this->block($page, 'features', 'features_row', 'Qué incluye', [
            'section_label' => 'Qué incluye',
            'title'         => 'Tres ámbitos,<br>una misma exigencia',
            'features'      => [
                ['title' => 'Residencial',                    'description' => 'Viviendas, áticos y residencias de alta gama diseñadas a medida, donde cada decisión responde al modo de vida de quien las habita.'],
                ['title' => 'Hotelero',                       'description' => 'Proyectos de hotelería boutique y 5 estrellas. Creamos atmósferas que convierten la estancia en una experiencia memorable.'],
                ['title' => 'Event Producer & Stand Builder', 'description' => 'Diseño y construcción de stands y espacios efímeros para ferias, showrooms y eventos corporativos de alto nivel.'],
            ],
        ], 40);

        $this->block($page, 'image_break', 'image_break', 'Image Break', [
            'image'      => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&q=80',
            'heading'    => 'Los espacios no se decoran: se escriben',
            'subheading' => 'Con luz, con materia, con tiempo',
        ], 50);

        $this->block($page, 'proceso', 'process_grid', 'Proceso', [
            'section_label' => 'Nuestro proceso',
            'title'         => 'Del plano<br>a la key del proyecto',
            'steps'         => [
                ['number' => '01', 'title' => 'Análisis del espacio',  'description' => 'Estudio del lugar, la luz, la circulación y el contexto. Escuchamos al cliente y al edificio.'],
                ['number' => '02', 'title' => 'Concepto y mood',       'description' => 'Definimos la atmósfera, la paleta de materiales y el relato estético que guiará cada decisión.'],
                ['number' => '03', 'title' => 'Desarrollo técnico',    'description' => 'Planos de detalle, mobiliario a medida, iluminación y especificaciones constructivas listos para obra.'],
                ['number' => '04', 'title' => 'Ejecución y key',       'description' => 'Dirección de obra, supervisión de proveedores y entrega llave en mano del proyecto terminado.'],
            ],
        ], 60);

        $this->block($page, 'gallery', 'gallery', 'Galería', [
            'section_label' => 'Proyectos seleccionados',
            'title'         => 'Interiores<br>recientes',
            'items'         => [
                ['image' => 'https://images.unsplash.com/photo-1600210492493-0946911123ea?w=600&q=80'],
                ['image' => 'https://images.unsplash.com/photo-1615873968403-89e068629265?w=600&q=80'],
                ['image' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&q=80'],
            ],
        ], 70);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Empecemos',
            'title'         => 'Diseñemos<br>tu espacio',
            'description'   => 'Solicita una consulta inicial gratuita. Visitamos el lugar, escuchamos tu visión y te proponemos un enfoque a medida.',
            'button_text'   => 'Contactar',
            'button_url'    => '/contacto',
        ], 80);
    }

    // -------------------------------------------------------------------------
    // Asistencia Ejecutiva
    // -------------------------------------------------------------------------

    private function seedPageAsistenciaEjecutiva(): void
    {
        $page = $this->page('asistencia-ejecutiva', [
            'title'            => 'Asistencia Ejecutiva',
            'meta_title'       => 'Asistencia Ejecutiva — SANZAHRA',
            'meta_description' => 'Asistencia Ejecutiva SANZAHRA — Servicio concierge integral para empresas y ejecutivos. Agenda, viajes, coordinación y discreción absoluta.',
            'layout'           => 'default',
            'is_active'        => true,
            'order'            => 8,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Asistencia', [
            'kicker'           => 'Asistencia Ejecutiva',
            'title'            => 'El lujo<br>del tiempo',
            'subtitle'         => 'Servicio concierge integral para empresas y ejecutivos de alto nivel. Nos ocupamos de todo lo que no tiene tiempo.',
            'background_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=80',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio',               'url' => '/'],
                ['label' => 'Servicios',            'url' => '/servicios'],
                ['label' => 'Asistencia Ejecutiva', 'url' => null],
            ],
        ], 20);

        $this->block($page, 'intro', 'intro_text', 'Intro Asistencia', [
            'section_label' => 'Disciplina',
            'title'         => 'Discreción absoluta,<br>eficacia total',
            'paragraph_1'   => 'Tu tiempo es el activo más valioso que posees. Nuestro servicio de asistencia ejecutiva se diseña para devolvértelo. Gestionamos agendas, viajes, reservas, imprevistos, búsqueda de recursos especializados y coordinación de equipos con la máxima profesionalidad.',
            'paragraph_2'   => 'Trabajamos con empresas y perfiles ejecutivos que exigen excelencia, rapidez y discreción absoluta. Un servicio silencioso, siempre disponible, que anticipa antes de que tú pidas.',
            'image'         => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80',
            'tags'          => ['Concierge', 'Agenda', 'Viajes', 'Discreción'],
        ], 30);

        $this->block($page, 'features', 'features_row', 'Áreas de trabajo', [
            'section_label' => 'Qué incluye',
            'title'         => 'Áreas<br>de trabajo',
            'features'      => [
                ['title' => 'Concierge empresarial',    'description' => 'Reservas, gestiones, búsqueda de recursos especializados y atención a imprevistos. Un interlocutor único disponible cuando lo necesitas.'],
                ['title' => 'Gestión integral',         'description' => 'Agenda, viajes corporativos, alojamientos, transportes y logística cotidiana resuelta con previsión y criterio.'],
                ['title' => 'Coordinación ejecutiva',   'description' => 'Interlocución con equipos internos, proveedores y colaboradores externos. Hacemos que todo se mueva al ritmo que necesitas.'],
            ],
        ], 40);

        $this->block($page, 'image_break', 'image_break', 'Image Break', [
            'image'      => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=1920&q=80',
            'heading'    => '«El verdadero lujo<br>es tener tiempo»',
            'subheading' => 'Nos ocupamos de los detalles para que tú te ocupes de lo esencial',
        ], 50);

        $this->block($page, 'proceso', 'process_grid', 'Proceso', [
            'section_label' => 'Nuestro proceso',
            'title'         => 'Cómo trabajamos',
            'steps'         => [
                ['number' => '01', 'title' => 'Alta del servicio',          'description' => 'Formalizamos el acuerdo con absoluta confidencialidad y establecemos los canales de comunicación seguros.'],
                ['number' => '02', 'title' => 'Definición de necesidades',  'description' => 'Entrevista inicial para entender tu día a día, tus preferencias, tus estándares y los puntos críticos a cubrir.'],
                ['number' => '03', 'title' => 'Asignación de asistente',    'description' => 'Designamos un profesional dedicado, con perfil y experiencia alineados con tu sector y tus exigencias.'],
                ['number' => '04', 'title' => 'Seguimiento continuo',       'description' => 'Revisión periódica del servicio, ajustes y mejoras. Nos adaptamos a la evolución de tus necesidades.'],
            ],
        ], 60);

        $this->block($page, 'gallery', 'gallery', 'Galería', [
            'section_label' => 'Visual',
            'title'         => 'Inspiración',
            'items'         => [
                ['image' => 'assets/img/branding/branding-04.jpg'],
                ['image' => 'assets/img/moda/moda-40-vestido-ondas-blanco.jpg'],
                ['image' => 'assets/img/extra/extra-11.jpg'],
            ],
        ], 70);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Empecemos',
            'title'         => 'Recupera<br>tu tiempo',
            'description'   => 'Agenda una conversación confidencial. Te explicaremos cómo podemos integrarnos en tu día a día desde el primer momento.',
            'button_text'   => 'Contactar',
            'button_url'    => '/contacto',
        ], 80);
    }

    // -------------------------------------------------------------------------
    // Arquitectura
    // -------------------------------------------------------------------------

    private function seedPageArquitectura(): void
    {
        $page = $this->page('arquitectura', [
            'title'            => 'Arquitectura',
            'meta_title'       => 'Arquitectura — SANZAHRA',
            'meta_description' => 'Arquitectura SANZAHRA — Arquitectura conceptual, neuronal y efímera para corporaciones, espacios de bienestar y eventos.',
            'layout'           => 'default',
            'is_active'        => true,
            'order'            => 9,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Arquitectura', [
            'kicker'           => 'Arquitectura',
            'title'            => 'Arquitectura<br>como lenguaje',
            'subtitle'         => 'Proyectamos espacios que comunican, cuidan y perduran. Desde la arquitectura corporativa hasta la efímera, cada obra es una declaración de identidad.',
            'background_image' => 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=1920&q=80',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio',        'url' => '/'],
                ['label' => 'Servicios',     'url' => '/servicios'],
                ['label' => 'Arquitectura',  'url' => null],
            ],
        ], 20);

        $this->block($page, 'intro', 'intro_text', 'Intro Arquitectura', [
            'section_label' => 'Disciplina',
            'title'         => 'Tres escalas,<br>una misma visión',
            'paragraph_1'   => 'Entendemos la arquitectura como un lenguaje capaz de expresar los valores de una marca, acoger la vida de las personas y crear atmósferas temporales memorables. Trabajamos en tres dimensiones complementarias: la arquitectura conceptual para corporaciones, la arquitectura neuronal que diseña espacios pensados para la experiencia humana y el bienestar, y la arquitectura efímera que da forma a eventos y activaciones de marca.',
            'paragraph_2'   => 'Cada proyecto nace de una escucha atenta al cliente, al lugar y al propósito. Desde ahí construimos espacios coherentes, bellos y profundamente humanos.',
            'image'         => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=800&q=80',
            'tags'          => ['Corporativa', 'Neuronal', 'Efímera', 'Bienestar'],
        ], 30);

        $this->block($page, 'features', 'features_row', 'Áreas de trabajo', [
            'section_label' => 'Qué incluye',
            'title'         => 'Áreas<br>de trabajo',
            'features'      => [
                ['title' => 'Conceptual corporativa',      'description' => 'Sedes, oficinas y espacios corporativos que traducen la identidad de la marca en arquitectura. Cada línea comunica.'],
                ['title' => 'Neuronal (espacios que cuidan)', 'description' => 'Arquitectura diseñada a partir del bienestar: luz, acústica, materiales y proporciones al servicio de la experiencia humana.'],
                ['title' => 'Efímera para eventos',        'description' => 'Estructuras, pabellones y activaciones temporales que convierten un espacio en una experiencia única durante el tiempo necesario.'],
            ],
        ], 40);

        $this->block($page, 'image_break', 'image_break', 'Image Break', [
            'image'      => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=1920&q=80',
            'heading'    => '«La arquitectura es la decisión<br>de cómo queremos vivir»',
            'subheading' => 'Diseñamos el marco de las experiencias importantes',
        ], 50);

        $this->block($page, 'proceso', 'process_grid', 'Proceso', [
            'section_label' => 'Nuestro proceso',
            'title'         => 'Cómo trabajamos',
            'steps'         => [
                ['number' => '01', 'title' => 'Análisis del emplazamiento', 'description' => 'Estudiamos el lugar, su luz, su orientación, su contexto y sus limitaciones. Todo proyecto empieza por escuchar el sitio.'],
                ['number' => '02', 'title' => 'Concepto arquitectónico',    'description' => 'Definimos la idea rectora: la forma, los materiales, la atmósfera. Un relato que guía todas las decisiones posteriores.'],
                ['number' => '03', 'title' => 'Desarrollo de planos',       'description' => 'Documentación técnica completa: planos, memorias, detalles constructivos y mediciones listas para obra.'],
                ['number' => '04', 'title' => 'Dirección de obra',          'description' => 'Acompañamos la ejecución en cada fase, garantizando que lo construido sea fiel al proyecto y a su espíritu.'],
            ],
        ], 60);

        $this->block($page, 'gallery', 'gallery', 'Galería', [
            'section_label' => 'Visual',
            'title'         => 'Inspiración',
            'items'         => [
                ['image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80'],
                ['image' => 'https://images.unsplash.com/photo-1511818966892-d7d671e672a2?w=800&q=80'],
                ['image' => 'https://images.unsplash.com/photo-1496564203457-11bb12075d90?w=800&q=80'],
            ],
        ], 70);

        $this->block($page, 'partner', 'partner', 'Partner Sumnomatec', [
            'section_label' => 'Partner',
            'title'         => 'En colaboración con<br>Sumnomatec',
            'description'   => 'Los proyectos de arquitectura de SANZAHRA se desarrollan junto a <strong>Sumnomatec</strong>, nuestro estudio partner especializado en arquitectura técnica, dirección de obra y soluciones constructivas avanzadas. Una alianza que une visión creativa y rigor técnico.',
            'button_text'   => 'Visitar sumnomatec.com →',
            'button_url'    => 'https://sumnomatec.com',
        ], 80);

        $this->block($page, 'cta_final', 'cta_final', 'CTA Final', [
            'section_label' => 'Empecemos',
            'title'         => '¿Tienes un proyecto<br>arquitectónico?',
            'description'   => 'Escríbenos y cuéntanos tu visión. Estudiamos el emplazamiento y te proponemos un enfoque a medida.',
            'button_text'   => 'Contactar',
            'button_url'    => '/contacto',
        ], 90);
    }

    // -------------------------------------------------------------------------
    // Portfolio
    // -------------------------------------------------------------------------

    private function seedPagePortfolio(): void
    {
        $page = $this->page('portfolio', [
            'title'            => 'Portfolio',
            'meta_title'       => 'Portfolio — SANZAHRA',
            'meta_description' => 'Portfolio SANZAHRA — Proyectos seleccionados de interiorismo, moda, arquitectura, branding y eventos.',
            'layout'           => 'portfolio',
            'is_active'        => true,
            'order'            => 10,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Portfolio', [
            'kicker'           => 'Portfolio',
            'title'            => 'Proyectos<br>seleccionados',
            'subtitle'         => 'Una selección de trabajos que reflejan nuestra filosofía: detalle, coherencia y excelencia en cada disciplina.',
            'background_image' => 'assets/img/extra/extra-20-bocetos-chanel.jpg',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio',    'url' => '/'],
                ['label' => 'Portfolio', 'url' => null],
            ],
        ], 20);

        $this->block($page, 'intro', 'intro_text', 'Intro Portfolio', [
            'section_label' => 'Nuestro trabajo',
            'title'         => 'Cada proyecto,<br>una historia única',
            'paragraph_1'   => 'En SANZAHRA cada encargo es tratado con la exclusividad que merece. Desde residencias privadas hasta campañas internacionales, pasando por hoteles de lujo y eventos corporativos, estos son algunos de los proyectos que definen nuestra manera de entender el diseño y la creatividad.',
        ], 30);

        $this->block($page, 'filters', 'portfolio_filters', 'Filtros Portfolio', [
            'filters' => [
                ['label' => 'Todo',         'value' => 'all'],
                ['label' => 'Moda',         'value' => 'moda'],
                ['label' => 'Branding',     'value' => 'branding'],
                ['label' => 'Eventos',      'value' => 'eventos'],
                ['label' => 'Interiorismo', 'value' => 'interiorismo'],
            ],
        ], 40);

        $this->block($page, 'masonry', 'masonry', 'Masonry Grid', [
            'items' => [
                ['image' => 'assets/img/eventos/eventos-17-pasarela-focos.jpg',                            'title' => 'Pasarela de Moda',                          'category' => 'moda eventos',   'aspect_ratio' => '3/4'],
                ['image' => 'assets/img/extra/extra-09.jpg',                                               'title' => 'Identidad de Marca',                        'category' => 'branding',       'aspect_ratio' => '1/1'],
                ['image' => 'assets/img/moda/moda-02.jpg',                                                 'title' => 'Campañas, producción, ventas',               'category' => 'moda',           'aspect_ratio' => '4/5'],
                ['image' => 'assets/img/extra/extra-15.jpg',                                               'title' => 'Colección conceptual La Florecilla PRO26-Rv01', 'category' => 'moda',        'aspect_ratio' => '3/4'],
                ['image' => 'assets/img/moda/moda-11.jpg',                                                 'title' => 'Lanzamiento de marca',                      'category' => 'eventos',        'aspect_ratio' => '3/2'],
                ['image' => 'assets/img/moda/moda-30-bocetos-pared.jpg',                                   'title' => 'Backstage de desfiles',                     'category' => 'moda eventos',   'aspect_ratio' => '2/3'],
                ['image' => 'assets/img/moda/moda-03.jpg',                                                 'title' => 'Lanzamiento de colección',                  'category' => 'eventos',        'aspect_ratio' => '3/2'],
                ['image' => 'https://images.unsplash.com/photo-1600607687644-c7171b42498f?w=700&q=80',    'title' => 'Hotel Boutique',                            'category' => 'interiorismo',   'aspect_ratio' => '4/5'],
                ['image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=700&q=80',    'title' => 'Residencial villas Luxury',                 'category' => 'interiorismo',   'aspect_ratio' => '1/1'],
            ],
        ], 50);

        $this->block($page, 'cta_proyecto', 'cta_final', 'CTA Proyecto', [
            'section_label' => 'Siguiente proyecto',
            'title'         => '¿Quieres ser nuestro<br>próximo proyecto?',
            'description'   => 'Nos encantaría conocer tu visión y explorar cómo podemos convertirla en realidad. Solicita una consulta inicial sin compromiso.',
            'button_text'   => 'Contactar',
            'button_url'    => '/contacto',
        ], 60);
    }

    // -------------------------------------------------------------------------
    // Contacto
    // -------------------------------------------------------------------------

    private function seedPageContacto(): void
    {
        $page = $this->page('contacto', [
            'title'            => 'Contacto',
            'meta_title'       => 'Contacto — SANZAHRA',
            'meta_description' => 'Contacto SANZAHRA — Solicita información, presupuesto o consulta inicial gratuita. Málaga.',
            'layout'           => 'contacto',
            'is_active'        => true,
            'order'            => 11,
        ]);

        $this->block($page, 'hero', 'page_hero', 'Hero Contacto', [
            'kicker'           => 'Contacto',
            'title'            => 'Hablemos de tu<br>próximo proyecto',
            'subtitle'         => 'Cada gran proyecto empieza con una conversación sincera. Cuéntanos tu idea y exploremos cómo darle forma juntos.',
            'background_image' => 'https://images.unsplash.com/photo-1539037116277-4db20889f2d4?w=1920&q=80',
        ], 10);

        $this->block($page, 'breadcrumb', 'breadcrumb', 'Breadcrumb', [
            'items' => [
                ['label' => 'Inicio',    'url' => '/'],
                ['label' => 'Contacto',  'url' => null],
            ],
        ], 20);

        $this->block($page, 'contact_duo', 'contact_duo', 'Contacto Duo', [
            'image'         => 'assets/img/extra/extra-17-contacto.jpg',
            'section_label' => 'Escríbenos',
            'title'         => 'Cuéntanos<br>tu proyecto',
            'lead'          => 'Respondemos en menos de 24 horas laborables con una propuesta personalizada.',
            'email'         => 'info@sanzahra.com',
            'tel'           => '+34 646 63 95 58',
            'direccion'     => 'Calle Córdoba 6, Málaga',
            'form_fields'   => ['nombre', 'email', 'telefono', 'asunto', 'mensaje'],
        ], 30);
    }

    // -------------------------------------------------------------------------
    // Política de Privacidad
    // -------------------------------------------------------------------------

    private function seedPagePoliticaPrivacidad(): void
    {
        $page = $this->page('politica-privacidad', [
            'title'            => 'Política de Privacidad',
            'meta_title'       => 'Política de Privacidad — SANZAHRA',
            'meta_description' => 'Política de Privacidad de SANZAHRA. Información sobre el tratamiento de datos personales conforme al RGPD y la LOPDGDD.',
            'layout'           => 'legal',
            'is_active'        => true,
            'order'            => 12,
        ]);

        $this->block($page, 'legal_content', 'legal_sections', 'Contenido Legal', [
            'last_updated' => 'Abril 2026',
            'intro'        => 'En SANZAHRA nos tomamos muy en serio la protección de los datos personales de nuestros usuarios, clientes y visitantes. Esta Política de Privacidad describe cómo recogemos, utilizamos y protegemos la información que nos facilitas a través de este sitio web, en cumplimiento del Reglamento (UE) 2016/679 General de Protección de Datos (RGPD) y de la Ley Orgánica 3/2018, de Protección de Datos Personales y garantía de los derechos digitales (LOPDGDD).',
            'sections'     => [
                [
                    'heading' => '1. Responsable del tratamiento',
                    'content' => 'El responsable del tratamiento de los datos personales recabados a través de este sitio web es SANZAHRA, con domicilio social en Calle Córdoba 6, 29001 Málaga (España), provista de CIF B-00000000 y dirección de contacto <a href="mailto:info@sanzahra.com">info@sanzahra.com</a>. Puedes dirigirte a nosotros por cualquiera de estas vías para cualquier cuestión relacionada con el tratamiento de tus datos personales.',
                ],
                [
                    'heading' => '2. Finalidades del tratamiento',
                    'content' => 'Tratamos los datos personales que nos facilitas con las siguientes finalidades: (i) gestionar y responder a las consultas o solicitudes de información enviadas a través del formulario de contacto o por correo electrónico; (ii) remitir comunicaciones comerciales e información sobre nuestros servicios cuando hayas prestado tu consentimiento para ello (newsletter); (iii) la prestación y ejecución de los servicios profesionales contratados, así como la gestión contable, fiscal y administrativa derivada de dicha relación.',
                ],
                [
                    'heading' => '3. Base legal',
                    'content' => 'La base jurídica para el tratamiento de tus datos es el consentimiento expreso que prestas al remitirnos un formulario o suscribirte a nuestra newsletter; la ejecución del contrato de prestación de servicios cuando eres cliente; y el interés legítimo de SANZAHRA en mantener la relación comercial existente y mejorar los servicios ofrecidos. El consentimiento puede ser retirado en cualquier momento sin que ello afecte a la licitud del tratamiento previo a su retirada.',
                ],
                [
                    'heading' => '4. Destinatarios',
                    'content' => 'Con carácter general, los datos personales no serán comunicados a terceros, salvo obligación legal o cuando sea estrictamente necesario para la prestación del servicio (por ejemplo, proveedores tecnológicos que actúan como encargados del tratamiento, entidades bancarias o la Administración Tributaria). En tal caso, los encargados del tratamiento estarán vinculados por contrato en los términos exigidos por el artículo 28 del RGPD. No se realizan transferencias internacionales de datos fuera del Espacio Económico Europeo sin las garantías adecuadas.',
                ],
                [
                    'heading' => '5. Conservación de los datos',
                    'content' => 'Los datos personales se conservarán durante el tiempo necesario para cumplir con la finalidad para la que fueron recabados y, en todo caso, durante los plazos legalmente establecidos para atender a las obligaciones derivadas de la relación contractual y las posibles responsabilidades que pudieran derivarse. Una vez finalizada dicha relación, los datos serán bloqueados durante los plazos de prescripción legales aplicables y, posteriormente, suprimidos de forma segura.',
                ],
                [
                    'heading' => '6. Derechos del interesado',
                    'content' => 'Puedes ejercer en cualquier momento tus derechos de <strong>Acceso, Rectificación, Supresión, Oposición, Portabilidad y Limitación</strong> del tratamiento, así como revocar el consentimiento prestado, dirigiendo una solicitud por escrito a <a href="mailto:info@sanzahra.com">info@sanzahra.com</a> o a la dirección postal indicada, adjuntando copia de tu documento de identidad. Asimismo, tienes derecho a presentar una reclamación ante la Agencia Española de Protección de Datos (<a href="https://www.aepd.es" target="_blank" rel="noopener">www.aepd.es</a>) si consideras que el tratamiento no se ajusta a la normativa vigente.',
                ],
                [
                    'heading' => '7. Cookies',
                    'content' => 'Este sitio web utiliza cookies propias y de terceros con finalidades técnicas, de personalización y analíticas. Las cookies técnicas son necesarias para el correcto funcionamiento del sitio y no requieren consentimiento. Las cookies analíticas nos permiten medir el uso de la web para mejorar nuestros servicios, y requieren tu consentimiento previo, que puedes gestionar a través del banner de cookies. Puedes consultar información ampliada en nuestra política de cookies.',
                ],
                [
                    'heading' => '8. Seguridad',
                    'content' => 'SANZAHRA ha adoptado las medidas técnicas y organizativas apropiadas para garantizar un nivel de seguridad adecuado al riesgo del tratamiento, incluyendo la protección frente al acceso no autorizado, la pérdida, destrucción o alteración accidental de los datos. Estas medidas se revisan periódicamente para asegurar su eficacia conforme al estado de la técnica.',
                ],
                [
                    'heading' => '9. Menores',
                    'content' => 'Los servicios ofrecidos a través de este sitio web no están dirigidos a menores de catorce (14) años. SANZAHRA no recaba intencionadamente datos personales de menores de dicha edad. En caso de detectar que se han facilitado datos de un menor sin la autorización de sus padres o tutores legales, procederemos a su eliminación de manera inmediata.',
                ],
                [
                    'heading' => '10. Modificaciones',
                    'content' => 'SANZAHRA se reserva el derecho a modificar la presente Política de Privacidad para adaptarla a novedades legislativas o jurisprudenciales, así como a cambios en nuestros servicios. Cualquier modificación será publicada en esta misma página, recomendando al usuario su consulta periódica.',
                ],
            ],
        ], 10);
    }

    // -------------------------------------------------------------------------
    // Términos y Condiciones
    // -------------------------------------------------------------------------

    private function seedPageTerminosCondiciones(): void
    {
        $page = $this->page('terminos-condiciones', [
            'title'            => 'Términos y Condiciones',
            'meta_title'       => 'Términos y Condiciones — SANZAHRA',
            'meta_description' => 'Términos y Condiciones de uso del sitio web de SANZAHRA. Condiciones generales, propiedad intelectual y legislación aplicable.',
            'layout'           => 'legal',
            'is_active'        => true,
            'order'            => 13,
        ]);

        $this->block($page, 'legal_content', 'legal_sections', 'Contenido Legal', [
            'last_updated' => 'Abril 2026',
            'intro'        => 'Las presentes condiciones regulan el acceso y uso del sitio web titularidad de SANZAHRA. El acceso y navegación por este sitio implica la aceptación sin reservas de los términos recogidos en este documento, por lo que recomendamos su lectura atenta antes de hacer uso de los contenidos y servicios aquí ofrecidos.',
            'sections'     => [
                [
                    'heading' => '1. Información general',
                    'content' => 'En cumplimiento del deber de información establecido en la Ley 34/2002, de Servicios de la Sociedad de la Información y Comercio Electrónico (LSSI-CE), se informa al usuario de que el titular del dominio <strong>sanzahra.com</strong> es SANZAHRA, con CIF B-00000000 y domicilio en Calle Córdoba 6, 29001 Málaga (España). Puedes contactar con nosotros en <a href="mailto:info@sanzahra.com">info@sanzahra.com</a>.',
                ],
                [
                    'heading' => '2. Objeto y ámbito de aplicación',
                    'content' => 'Las presentes condiciones tienen por objeto regular el acceso, navegación y uso del sitio web, así como las responsabilidades derivadas del mismo. Su aceptación es necesaria para el acceso y la utilización de los servicios del sitio. SANZAHRA se reserva la facultad de modificar en cualquier momento la presentación, configuración y contenidos del sitio, así como las presentes condiciones.',
                ],
                [
                    'heading' => '3. Condiciones de uso del sitio',
                    'content' => 'El usuario se compromete a hacer un uso diligente, correcto y lícito del sitio web y, en particular, a no utilizarlo para desarrollar actividades contrarias a la ley, la moral o el orden público. Queda prohibido reproducir, copiar, distribuir, transmitir, modificar o manipular los contenidos del sitio sin autorización expresa y escrita de SANZAHRA, así como cualquier conducta que pueda dañar, sobrecargar o deteriorar los sistemas tecnológicos del sitio.',
                ],
                [
                    'heading' => '4. Propiedad intelectual e industrial',
                    'content' => 'Todos los contenidos del sitio web (textos, fotografías, gráficos, imágenes, iconos, tecnología, software, código fuente, nombres de dominio, marcas y signos distintivos) son titularidad de SANZAHRA o, en su caso, cuenta con las correspondientes licencias de uso, y están protegidos por la normativa nacional e internacional sobre propiedad intelectual e industrial. El acceso al sitio no otorga al usuario ningún derecho de propiedad sobre sus contenidos, limitándose a permitir su visualización para uso personal y no comercial.',
                ],
                [
                    'heading' => '5. Responsabilidad',
                    'content' => 'SANZAHRA no garantiza la disponibilidad y continuidad ininterrumpida del sitio web, si bien realiza sus mejores esfuerzos para mantenerlo operativo. En consecuencia, no será responsable por los daños o perjuicios derivados de interrupciones, averías, virus o desconexiones en el sistema. Del mismo modo, el sitio puede contener enlaces a páginas web de terceros respecto de cuyos contenidos SANZAHRA no se hace responsable, no asumiendo ninguna obligación de supervisión ni garantía sobre los mismos.',
                ],
                [
                    'heading' => '6. Servicios ofrecidos',
                    'content' => 'A través de este sitio web, SANZAHRA presenta con carácter informativo sus servicios profesionales en las áreas de interiorismo, branding, moda, arquitectura, producción de eventos y asistencia ejecutiva. El sitio no constituye un canal de venta directa: todos los servicios se prestan previa solicitud del usuario y elaboración de un presupuesto personalizado, sin que tenga lugar ninguna transacción económica a través del sitio. Las condiciones particulares de cada servicio se acordarán mediante contrato específico entre las partes.',
                ],
                [
                    'heading' => '7. Política de cookies',
                    'content' => 'Este sitio web utiliza cookies propias y de terceros para ofrecer una mejor experiencia de navegación y analizar el uso del sitio. Puedes obtener información detallada sobre las cookies utilizadas, su finalidad y la forma de gestionarlas o deshabilitarlas en nuestra <a href="/politica-privacidad">Política de Privacidad</a>.',
                ],
                [
                    'heading' => '8. Protección de datos',
                    'content' => 'El tratamiento de los datos personales recabados a través del sitio web se rige por lo dispuesto en nuestra <a href="/politica-privacidad">Política de Privacidad</a>, documento que forma parte integrante de las presentes condiciones y cuyo contenido el usuario declara conocer y aceptar al utilizar el sitio.',
                ],
                [
                    'heading' => '9. Modificaciones del sitio y condiciones',
                    'content' => 'SANZAHRA se reserva el derecho de efectuar, sin previo aviso, las modificaciones que considere oportunas en su sitio web, pudiendo cambiar, suprimir o añadir tanto los contenidos y servicios que se presten a través del mismo como la forma en la que éstos aparezcan presentados o localizados, así como las presentes condiciones. La vigencia de las citadas condiciones irá en función de su exposición y estarán vigentes hasta que sean modificadas por otras debidamente publicadas.',
                ],
                [
                    'heading' => '10. Legislación aplicable',
                    'content' => 'Las presentes condiciones se rigen e interpretan conforme a la legislación española. Para la resolución de cualquier controversia que pudiera derivarse del acceso o uso del sitio web, las partes se someten expresamente a los Juzgados y Tribunales de Madrid capital, con renuncia expresa a cualquier otro fuero que pudiera corresponderles, salvo que la legislación aplicable disponga imperativamente otro fuero.',
                ],
                [
                    'heading' => '11. Contacto',
                    'content' => 'Para cualquier duda, comentario o consulta relacionada con las presentes condiciones o el funcionamiento del sitio web, puedes dirigirte a SANZAHRA a través del correo electrónico <a href="mailto:info@sanzahra.com">info@sanzahra.com</a> o escribiendo a nuestra dirección postal: Calle Córdoba 6, 29001 Málaga.',
                ],
            ],
        ], 10);
    }
}
