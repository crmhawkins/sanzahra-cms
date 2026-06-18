@extends('layouts.app')
@php $bodyClass = 'is-home'; @endphp

@section('content')

  {{-- Hero Slider --}}
  <section class="hero">
    <div class="hero-slider">
      @php $slides = $page->blockByKey('hero_slider')?->get('slides', []); @endphp
      @if($slides)
        @foreach($slides as $i => $slide)
          <div class="hero-slide {{ $i === 0 ? 'active' : '' }}" data-label="{{ $slide['label'] ?? '' }}" style="background-image:url('{{ image_url($slide['image'] ?? null) }}')"></div>
        @endforeach
      @else
        <div class="hero-slide active" data-label="Moda" style="background-image:url('/assets/img/moda/moda-06.jpg')"></div>
        <div class="hero-slide" data-label="Producci&oacute;n de Eventos" style="background-image:url('/assets/img/extra/extra-21-flores-coral.jpg')"></div>
        <div class="hero-slide" data-label="Branding" style="background-image:url('/assets/img/branding/branding-05.jpg')"></div>
        <div class="hero-slide" data-label="Interiorismo" style="background-image:url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&q=80')"></div>
      @endif
    </div>
    <div class="hero-content">
      <div class="hero-line"></div>
      <h1>{{ $page->blockByKey('hero_slider')?->get('title', 'SANZAHRA') }}</h1>
      <p>{{ $page->blockByKey('hero_slider')?->get('subtitle', 'Moda · Branding · Producción de Eventos · Interiorismo') }}</p>
    </div>
    <div class="hero-slide-label">Moda</div>
    <div class="hero-slider-dots">
      <button class="hero-slider-dot active" aria-label="Slide 1"></button>
      <button class="hero-slider-dot" aria-label="Slide 2"></button>
      <button class="hero-slider-dot" aria-label="Slide 3"></button>
      <button class="hero-slider-dot" aria-label="Slide 4"></button>
    </div>
    <div class="hero-scroll"><span></span></div>
  </section>

  {{-- Marquee --}}
  @php
    $marqueeText  = $page->blockByKey('marquee')?->get('content', 'MODA · BRANDING · PRODUCCIÓN DE EVENTOS · INTERIORISMO · PASARELAS · IDENTIDAD DE MARCAS');
    $marqueeItems = array_values(array_filter(array_map('trim', preg_split('/·/u', $marqueeText))));
  @endphp
  <div class="marquee-container">
    <div class="marquee">
      @for($r = 0; $r < 2; $r++)
        @foreach($marqueeItems as $term)
          <span>{{ $term }}</span><span class="filled">&middot;</span>
        @endforeach
      @endfor
    </div>
  </div>

  {{-- Intro --}}
  <section>
    <div class="two-col">
      <div class="two-col-image reveal" style="background-image:url('{{ image_url($page->blockByKey('intro')?->get('image'), 'assets/img/extra/extra-07.jpg') }}')"></div>
      <div class="reveal">
        <p class="section-label">{{ $page->blockByKey('intro')?->get('section_label', 'Sobre Nosotros') }}</p>
        <h2 class="section-title">{!! $page->blockByKey('intro')?->get('title', 'Donde la creatividad<br>se convierte en experiencia') !!}</h2>
        <p class="section-text">
          {!! $page->blockByKey('intro')?->get('paragraph_1', 'SANZAHRA es una empresa matriz creativa que integra moda, branding, producci&oacute;n de eventos e interiorismo bajo una misma visi&oacute;n. Creamos marcas, producimos pasarelas, dise&ntilde;amos experiencias y construimos identidades que perduran.') !!}
        </p>
        <p class="section-text">
          {!! $page->blockByKey('intro')?->get('paragraph_2', 'Creemos en la fuerza de la est&eacute;tica, la precisi&oacute;n y la innovaci&oacute;n como pilares de cada proyecto. Cada detalle cuenta una historia.') !!}
        </p>
        <div style="margin-top: 2rem;">
          <a href="{{ nav_url($page->blockByKey('intro')?->get('button_url', 'sobre-nosotros')) }}" class="btn">{{ $page->blockByKey('intro')?->get('button_text', 'Conoce más') }}</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Image break 1 --}}
  <div class="image-break" style="background-image:url('{{ image_url($page->blockByKey('image_break_1')?->get('image'), 'assets/img/extra/extra-13.jpg') }}')">
    <div class="image-break-text">
      <h3>{!! $page->blockByKey('image_break_1')?->get('heading', 'Moda, cultura y experiencia') !!}</h3>
      <p>{{ $page->blockByKey('image_break_1')?->get('subheading', 'Donde cada detalle cuenta una historia') }}</p>
    </div>
  </div>

  {{-- Services --}}
  @php
    $servicesBlock = $page->blockByKey('services_grid');
    $services = $servicesBlock?->get('services', []);
  @endphp
  <section>
    <div class="container">
      <p class="section-label reveal">{{ $servicesBlock?->get('section_label', 'Nuestros Servicios') }}</p>
      <h2 class="section-title reveal">{{ $servicesBlock?->get('title', 'Excelencia en cada disciplina') }}</h2>
    </div>
    <div class="services-visual-grid reveal">
      @if($services)
        @foreach($services as $s)
          <a href="{{ nav_url($s['url'] ?? '/') }}" class="service-visual-card" style="background-image:url('{{ image_url($s['image'] ?? null) }}')">
            <span class="card-arrow">&nearr;</span>
            <div class="card-content">
              <div class="card-number">{{ $s['number'] ?? '' }}</div>
              <h3>{{ $s['title'] ?? '' }}</h3>
              <p>{{ $s['description'] ?? '' }}</p>
            </div>
          </a>
        @endforeach
      @else
        <a href="{{ route('page', 'moda') }}" class="service-visual-card" style="background-image:url('/assets/img/extra/extra-10.jpg')">
          <span class="card-arrow">&nearr;</span>
          <div class="card-content">
            <div class="card-number">01</div>
            <h3>Moda</h3>
            <p>Marcas propias, colaboraciones, talento e identidad de marcas de moda.</p>
          </div>
        </a>
        <a href="{{ route('page', 'branding') }}" class="service-visual-card" style="background-image:url('/assets/img/extra/extra-11.jpg')">
          <span class="card-arrow">&nearr;</span>
          <div class="card-content">
            <div class="card-number">02</div>
            <h3>Branding &amp; Marketing</h3>
            <p>Identidad, narrativa y posicionamiento que transforman marcas en s&iacute;mbolos.</p>
          </div>
        </a>
        <a href="{{ route('page', 'event-producer') }}" class="service-visual-card" style="background-image:url('/assets/img/extra/extra-eventos-flores.jpg')">
          <span class="card-arrow">&nearr;</span>
          <div class="card-content">
            <div class="card-number">03</div>
            <h3>Producci&oacute;n de Eventos</h3>
            <p>Galas, pasarelas, lanzamientos y activaciones que se viven antes de contarse.</p>
          </div>
        </a>
        <a href="{{ route('page', 'interiorismo') }}" class="service-visual-card" style="background-image:url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&q=80')">
          <span class="card-arrow">&nearr;</span>
          <div class="card-content">
            <div class="card-number">04</div>
            <h3>Interiorismo</h3>
            <p>Espacios &iacute;ntimos y hoteleros que se habitan como si fueran propios.</p>
          </div>
        </a>
        <a href="{{ route('page', 'asistencia-ejecutiva') }}" class="service-visual-card" style="background-image:url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80')">
          <span class="card-arrow">&nearr;</span>
          <div class="card-content">
            <div class="card-number">05</div>
            <h3>Asistencia Ejecutiva</h3>
            <p>Concierge silencioso y exigente para quien no tiene tiempo que perder.</p>
          </div>
        </a>
        <a href="{{ route('page', 'arquitectura') }}" class="service-visual-card" style="background-image:url('https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=600&q=80')">
          <span class="card-arrow">&nearr;</span>
          <div class="card-content">
            <div class="card-number">06</div>
            <h3>Arquitectura</h3>
            <p>Arquitectura conceptual, neuronal y ef&iacute;mera con vocaci&oacute;n de permanecer.</p>
          </div>
        </a>
      @endif
    </div>
  </section>

  {{-- Image break 2 --}}
  <div class="image-break" style="background-image:url('{{ image_url($page->blockByKey('image_break_2')?->get('image'), 'assets/img/eventos/eventos-09.jpg') }}')">
    <div class="image-break-text">
      <h3>{!! $page->blockByKey('image_break_2')?->get('heading', 'Cada proyecto, una nueva visión') !!}</h3>
      <p>{{ $page->blockByKey('image_break_2')?->get('subheading', 'Moda · Identidades · Experiencias') }}</p>
    </div>
  </div>

  {{-- Portfolio teaser --}}
  @php
    $portfolioBlock = $page->blockByKey('portfolio_teaser');
    $portfolioItems = $portfolioBlock?->get('items', []);
    $portfolioBtnUrl = $portfolioBlock?->get('button_url', 'portfolio');
  @endphp
  <section class="bg-dark">
    <div class="container">
      <p class="section-label reveal">{{ $portfolioBlock?->get('section_label', 'Portfolio') }}</p>
      <h2 class="section-title reveal">{{ $portfolioBlock?->get('title', 'Proyectos seleccionados') }}</h2>
    </div>
    <div class="portfolio-grid reveal">
      @if($portfolioItems)
        @foreach($portfolioItems as $item)
          @php $lay = $item['layout'] ?? 'normal'; @endphp
          <a href="{{ nav_url($portfolioBtnUrl) }}" class="portfolio-item{{ $lay && $lay !== 'normal' ? ' '.$lay : '' }}" style="background-image:url('{{ image_url($item['image'] ?? null) }}')">
            <div class="portfolio-info"><h4>{{ $item['title'] ?? '' }}</h4><span>{{ $item['category'] ?? '' }}</span></div>
          </a>
        @endforeach
      @else
        <a href="{{ route('page', 'portfolio') }}" class="portfolio-item tall" style="background-image:url('/assets/img/extra/extra-01.jpg')">
          <div class="portfolio-info"><h4>Pasarela La Florecilla</h4><span>Moda</span></div>
        </a>
        <a href="{{ route('page', 'portfolio') }}" class="portfolio-item wide" style="background-image:url('/assets/img/moda/moda-16.jpg')">
          <div class="portfolio-info"><h4>Pasarela Internacional</h4><span>Producci&oacute;n de Eventos</span></div>
        </a>
        <a href="{{ route('page', 'portfolio') }}" class="portfolio-item wide" style="background-image:url('/assets/img/moda/moda-08.jpg')">
          <div class="portfolio-info"><h4>Producci&oacute;n de desfiles</h4><span>Producci&oacute;n de Eventos</span></div>
        </a>
        <a href="{{ route('page', 'portfolio') }}" class="portfolio-item" style="background-image:url('/assets/img/branding/branding-07.jpg')">
          <div class="portfolio-info"><h4>Campa&ntilde;a Editorial</h4><span>Moda</span></div>
        </a>
        <a href="{{ route('page', 'portfolio') }}" class="portfolio-item" style="background-image:url('/assets/img/extra/extra-04.jpg')">
          <div class="portfolio-info"><h4>Manual de Marca Solenne</h4><span>Branding</span></div>
        </a>
        <a href="{{ route('page', 'portfolio') }}" class="portfolio-item" style="background-image:url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&q=80')">
          <div class="portfolio-info"><h4>Residencial villas Luxury</h4><span>Interiorismo</span></div>
        </a>
      @endif
    </div>
    <div style="text-align:center; margin-top: 3rem;">
      <a href="{{ nav_url($portfolioBtnUrl) }}" class="btn btn-light">{{ $portfolioBlock?->get('button_text', 'Ver todo el portfolio') }}</a>
    </div>
  </section>

  {{-- CTA --}}
  @php $cta = $page->blockByKey('cta_final'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Hablemos') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', '¿Tienes un proyecto<br>en mente?') !!}</h2>
      <p>{{ $cta?->get('description', 'Estamos listos para escucharte. Cada gran proyecto empieza con una conversación.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Contáctanos') }}</a>
    </div>
  </section>

@endsection
