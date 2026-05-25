<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Page;
use Illuminate\Database\Seeder;

class BlockLabelsSeeder extends Seeder
{
    public function run(): void
    {
        $this->updatePage('inicio', [
            'hero_slider'     => 'Carrusel principal de inicio (rotativo)',
            'marquee'         => 'Texto animado (banda deslizante)',
            'intro'           => "Sección 'Sobre Nosotros' (imagen izquierda + texto derecha)",
            'image_break_1'   => 'Banda de imagen 1 (entre Sobre Nosotros y Servicios)',
            'services_grid'   => 'Grid de 6 Servicios',
            'image_break_2'   => 'Banda de imagen 2 (entre Servicios y Portfolio)',
            'portfolio_teaser'=> 'Avance del Portfolio (6 proyectos destacados)',
            'cta_final'       => 'Llamada a la acción final (botón Contáctanos)',
        ]);

        $this->updatePage('sobre-nosotros', [
            'hero_about'  => 'Cabecera de página',
            'pull_quote'  => 'Cita destacada',
            'full_image'  => 'Imagen completa (ancho total)',
            'filosofia'   => 'Filosofía (2 columnas texto + imagen)',
            'stat_block'  => 'Bloque de estadística (+50 proyectos)',
            'timeline'    => 'Línea de tiempo / Hitos',
            'equipo'      => 'Equipo (rejilla 3 personas)',
            'valores'     => 'Valores (4 ítems)',
            'cta_final'   => 'Llamada a la acción final',
        ]);

        $this->updatePage('servicios', [
            'hero'          => 'Cabecera de página',
            'breadcrumb'    => 'Migas de pan (navegación)',
            'intro_vision'  => 'Introducción / Visión integral',
            'service_rows'  => 'Filas de servicios (6 servicios detallados)',
            'ventajas'      => 'Ventajas de trabajar con SANZAHRA',
            'cta_final'     => 'Llamada a la acción final',
        ]);

        $this->updatePage('moda', [
            'hero'           => 'Cabecera de página Moda',
            'breadcrumb'     => 'Migas de pan (navegación)',
            'intro'          => 'Introducción Moda (imagen + texto)',
            'marcas_propias' => 'Marcas propias (La Florecilla)',
            'colaboraciones' => 'Colaboraciones con diseñadores',
            'image_break'    => 'Banda de imagen',
            'talento_form'   => 'Formulario captación de talento',
            'identidad_tags' => 'Identidad de marcas (tags)',
            'desfiles_cta'   => 'Desfiles y CTA de eventos',
            'cta_final'      => 'Llamada a la acción final',
        ]);

        // Páginas de servicios verticales: mismo patrón
        foreach (['branding', 'event-producer', 'interiorismo', 'asistencia-ejecutiva', 'arquitectura'] as $slug) {
            $labels = [
                'hero'       => 'Cabecera de página',
                'breadcrumb' => 'Migas de pan (navegación)',
                'intro'      => 'Introducción (imagen + texto)',
                'features'   => 'Características / Qué incluye',
                'image_break'=> 'Banda de imagen',
                'proceso'    => 'Proceso de trabajo (pasos)',
                'gallery'    => 'Galería de imágenes',
                'partner'    => 'Partner / Colaborador estratégico',
                'cta_final'  => 'Llamada a la acción final',
            ];
            $this->updatePage($slug, $labels);
        }

        $this->updatePage('portfolio', [
            'hero'        => 'Cabecera de página',
            'breadcrumb'  => 'Migas de pan (navegación)',
            'intro'       => 'Introducción del portfolio',
            'filters'     => 'Filtros del portfolio (categorías)',
            'masonry'     => 'Cuadrícula de proyectos (9 ítems)',
            'cta_proyecto'=> 'CTA — ¿Quieres ser nuestro próximo proyecto?',
        ]);

        $this->updatePage('contacto', [
            'hero'        => 'Cabecera de página',
            'breadcrumb'  => 'Migas de pan (navegación)',
            'contact_duo' => 'Bloque de contacto (imagen + formulario + datos)',
        ]);

        $this->updatePage('politica-privacidad', [
            'legal_content' => 'Texto legal — Política de Privacidad (apartados editables)',
        ]);

        $this->updatePage('terminos-condiciones', [
            'legal_content' => 'Texto legal — Términos y Condiciones (apartados editables)',
        ]);
    }

    private function updatePage(string $slug, array $keyLabels): void
    {
        $page = Page::where('slug', $slug)->first();
        if (! $page) {
            return;
        }

        foreach ($keyLabels as $key => $label) {
            Block::where('page_id', $page->id)
                ->where('key', $key)
                ->update(['label' => $label]);
        }
    }
}
