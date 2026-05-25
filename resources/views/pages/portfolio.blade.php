@extends('layouts.app')

@section('content')

  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($page->blockByKey('hero')?->get('image'), 'assets/img/extra/extra-20-bocetos-chanel.jpg') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">Portfolio</p>
      <h1>Proyectos<br>seleccionados</h1>
      <p class="subtitle">Una selecci&oacute;n de trabajos que reflejan nuestra filosof&iacute;a: detalle, coherencia y excelencia en cada disciplina.</p>
    </div>
  </section>

  <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> Portfolio</nav>

  <section>
    <div class="container">
      <p class="section-label reveal">Nuestro trabajo</p>
      <h2 class="section-title reveal">Cada proyecto,<br>una historia &uacute;nica</h2>
      <p class="section-text reveal">En SANZAHRA cada encargo es tratado con la exclusividad que merece. Desde residencias privadas hasta campa&ntilde;as internacionales, pasando por hoteles de lujo y eventos corporativos, estos son algunos de los proyectos que definen nuestra manera de entender el dise&ntilde;o y la creatividad.</p>
    </div>

    <div class="portfolio-filters reveal">
      <button class="portfolio-filter active" type="button" data-filter="all">Todo</button>
      <button class="portfolio-filter" type="button" data-filter="moda">Moda</button>
      <button class="portfolio-filter" type="button" data-filter="branding">Branding</button>
      <button class="portfolio-filter" type="button" data-filter="eventos">Eventos</button>
      <button class="portfolio-filter" type="button" data-filter="interiorismo">Interiorismo</button>
    </div>
  </section>

  <section style="padding-top:0;">
    <div class="masonry reveal">
      @php $items = $page->blockByKey('portfolio_items')?->get('items', []); @endphp
      @if($items)
        @foreach($items as $item)
          <a href="#" class="masonry-item" data-category="{{ $item['category'] ?? '' }}">
            <div class="img" style="background-image:url('{{ image_url($item['image'] ?? null) }}'); aspect-ratio: {{ $item['ratio'] ?? '3/4' }};"></div>
            <div class="info"><h4>{{ $item['title'] ?? '' }}</h4><span>{{ $item['subtitle'] ?? '' }}</span></div>
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

  <section>
    <div class="cta-block">
      <p class="section-label">Siguiente proyecto</p>
      <h2 class="section-title">&iquest;Quieres ser nuestro<br>pr&oacute;ximo proyecto?</h2>
      <p>Nos encantar&iacute;a conocer tu visi&oacute;n y explorar c&oacute;mo podemos convertirla en realidad. Solicita una consulta inicial sin compromiso.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Contactar</a>
    </div>
  </section>

@endsection
