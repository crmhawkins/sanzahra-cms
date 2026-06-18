@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero'); @endphp
  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($hero?->get('background_image'), 'assets/img/extra/extra-20-bocetos-chanel.jpg') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">{{ $hero?->get('kicker', 'Portfolio') }}</p>
      <h1>{!! $hero?->get('title', 'Proyectos<br>seleccionados') !!}</h1>
      <p class="subtitle">{!! $hero?->get('subtitle', 'Una selecci&oacute;n de trabajos que reflejan nuestra filosof&iacute;a: detalle, coherencia y excelencia en cada disciplina.') !!}</p>
    </div>
  </section>

  @php $breadcrumb = $page->blockByKey('breadcrumb')?->get('items', []); @endphp
  @if($breadcrumb)
    <nav class="breadcrumb">
      @foreach($breadcrumb as $i => $crumb)
        @if($i > 0) <span>/</span> @endif
        @if(!empty($crumb['url']))<a href="{{ nav_url($crumb['url']) }}">{{ $crumb['label'] ?? '' }}</a>@else{{ $crumb['label'] ?? '' }}@endif
      @endforeach
    </nav>
  @else
    <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> Portfolio</nav>
  @endif

  @php $intro = $page->blockByKey('intro'); @endphp
  <section>
    <div class="container">
      <p class="section-label reveal">{{ $intro?->get('section_label', 'Nuestro trabajo') }}</p>
      <h2 class="section-title reveal">{!! $intro?->get('title', 'Cada proyecto,<br>una historia &uacute;nica') !!}</h2>
      <p class="section-text reveal">{!! $intro?->get('paragraph_1', 'En SANZAHRA cada encargo es tratado con la exclusividad que merece. Desde residencias privadas hasta campa&ntilde;as internacionales, pasando por hoteles de lujo y eventos corporativos, estos son algunos de los proyectos que definen nuestra manera de entender el dise&ntilde;o y la creatividad.') !!}</p>
    </div>

    @php $filters = $page->blockByKey('filters')?->get('filters', []); @endphp
    <div class="portfolio-filters reveal">
      @if($filters)
        @foreach($filters as $i => $filter)
          <button class="portfolio-filter{{ $i === 0 ? ' active' : '' }}" type="button" data-filter="{{ $filter['value'] ?? '' }}">{{ $filter['label'] ?? '' }}</button>
        @endforeach
      @else
        <button class="portfolio-filter active" type="button" data-filter="all">Todo</button>
        <button class="portfolio-filter" type="button" data-filter="moda">Moda</button>
        <button class="portfolio-filter" type="button" data-filter="branding">Branding</button>
        <button class="portfolio-filter" type="button" data-filter="eventos">Eventos</button>
        <button class="portfolio-filter" type="button" data-filter="interiorismo">Interiorismo</button>
      @endif
    </div>
  </section>

  <section style="padding-top:0;">
    <div class="masonry reveal">
      @php $items = $page->blockByKey('masonry')?->get('items', []); @endphp
      @if($items)
        @foreach($items as $item)
          @php
            $catLabel = $item['category_label']
              ?? collect(explode(' ', (string)($item['category'] ?? '')))->filter()->map(fn ($c) => \Illuminate\Support\Str::ucfirst($c))->implode(' / ');
          @endphp
          <a href="#" class="masonry-item" data-category="{{ $item['category'] ?? '' }}">
            <div class="img" style="background-image:url('{{ image_url($item['image'] ?? null) }}'); aspect-ratio: {{ $item['aspect_ratio'] ?? '3/4' }};"></div>
            <div class="info"><h4>{{ $item['title'] ?? '' }}</h4><span>{{ $catLabel }}</span></div>
          </a>
        @endforeach
      @else
        <a href="#" class="masonry-item" data-category="moda eventos">
          <div class="img" style="background-image:url('/assets/img/eventos/eventos-17-pasarela-focos.jpg'); aspect-ratio: 3/4;"></div>
          <div class="info"><h4>Pasarela de Moda</h4><span>Moda / Eventos</span></div>
        </a>
        <a href="#" class="masonry-item" data-category="branding">
          <div class="img" style="background-image:url('/assets/img/extra/extra-09.jpg'); aspect-ratio: 1/1;"></div>
          <div class="info"><h4>Identidad de Marca</h4><span>Branding</span></div>
        </a>
        <a href="#" class="masonry-item" data-category="moda">
          <div class="img" style="background-image:url('/assets/img/moda/moda-02.jpg'); aspect-ratio: 4/5;"></div>
          <div class="info"><h4>Campa&ntilde;as, producci&oacute;n, ventas</h4><span>Moda</span></div>
        </a>
        <a href="#" class="masonry-item" data-category="moda">
          <div class="img" style="background-image:url('/assets/img/extra/extra-15.jpg'); aspect-ratio: 3/4;"></div>
          <div class="info"><h4>Colecci&oacute;n conceptual La Florecilla PRO26-Rv01</h4><span>Moda / Marca propia</span></div>
        </a>
        <a href="#" class="masonry-item" data-category="eventos">
          <div class="img" style="background-image:url('/assets/img/moda/moda-11.jpg'); aspect-ratio: 3/2;"></div>
          <div class="info"><h4>Lanzamiento de marca</h4><span>Producci&oacute;n de Eventos</span></div>
        </a>
        <a href="#" class="masonry-item" data-category="moda eventos">
          <div class="img" style="background-image:url('/assets/img/moda/moda-30-bocetos-pared.jpg'); aspect-ratio: 2/3;"></div>
          <div class="info"><h4>Backstage de desfiles</h4><span>Moda / Eventos</span></div>
        </a>
        <a href="#" class="masonry-item" data-category="eventos">
          <div class="img" style="background-image:url('/assets/img/moda/moda-03.jpg'); aspect-ratio: 3/2;"></div>
          <div class="info"><h4>Lanzamiento de colecci&oacute;n</h4><span>Producci&oacute;n de Eventos</span></div>
        </a>
        <a href="#" class="masonry-item" data-category="interiorismo">
          <div class="img" style="background-image:url('https://images.unsplash.com/photo-1600607687644-c7171b42498f?w=700&q=80'); aspect-ratio: 4/5;"></div>
          <div class="info"><h4>Hotel Boutique</h4><span>Interiorismo</span></div>
        </a>
        <a href="#" class="masonry-item" data-category="interiorismo">
          <div class="img" style="background-image:url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=700&q=80'); aspect-ratio: 1/1;"></div>
          <div class="info"><h4>Residencial villas Luxury</h4><span>Interiorismo</span></div>
        </a>
      @endif
    </div>
  </section>

  @php $cta = $page->blockByKey('cta_proyecto'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Siguiente proyecto') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', '&iquest;Quieres ser nuestro<br>pr&oacute;ximo proyecto?') !!}</h2>
      <p>{{ $cta?->get('description', 'Nos encantaría conocer tu visión y explorar cómo podemos convertirla en realidad. Solicita una consulta inicial sin compromiso.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Contactar') }}</a>
    </div>
  </section>

@endsection
