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
  <div class="marquee-container">
    <div class="marquee">
      <span>MODA</span><span class="filled">&middot;</span>
      <span>BRANDING</span><span class="filled">&middot;</span>
      <span>PRODUCCI&Oacute;N DE EVENTOS</span><span class="filled">&middot;</span>
      <span>INTERIORISMO</span><span class="filled">&middot;</span>
      <span>PASARELAS</span><span class="filled">&middot;</span>
      <span>IDENTIDAD DE MARCAS</span><span class="filled">&middot;</span>
      <span>MODA</span><span class="filled">&middot;</span>
      <span>BRANDING</span><span class="filled">&middot;</span>
      <span>PRODUCCI&Oacute;N DE EVENTOS</span><span class="filled">&middot;</span>
      <span>INTERIORISMO</span><span class="filled">&middot;</span>
      <span>PASARELAS</span><span class="filled">&middot;</span>
      <span>IDENTIDAD DE MARCAS</span><span class="filled">&middot;</span>
    </div>
  </div>

  {{-- Intro --}}
  <section>
    <div class="two-col">
      <div class="two-col-image reveal" style="background-image:url('{{ image_url($page->blockByKey('intro')?->get('image'), 'assets/img/extra/extra-07.jpg') }}')"></div>
      <div class="reveal">
        <p class="section-label">{{ $page->blockByKey('intro')?->get('label', 'Sobre Nosotros') }}</p>
        <h2 class="section-title">{!! $page->blockByKey('intro')?->get('title', 'Donde la creatividad<br>se convierte en experiencia') !!}</h2>
        <p class="section-text">
          {!! $page->blockByKey('intro')?->get('paragraph_1', 'SANZAHRA es una empresa matriz creativa que integra moda, branding, producci&oacute;n de eventos e interiorismo bajo una misma visi&oacute;n. Creamos marcas, producimos pasarelas, dise&ntilde;amos experiencias y construimos identidades que perduran.') !!}
        </p>
        <p class="section-text">
          {!! $page->blockByKey('intro')?->get('paragraph_2', 'Creemos en la fuerza de la est&eacute;tica, la precisi&oacute;n y la innovaci&oacute;n como pilares de cada proyecto. Cada detalle cuenta una historia.') !!}
        </p>
        <div style="margin-top: 2rem;">
          <a href="{{ route('page', 'sobre-nosotros') }}" class="btn">Conoce m&aacute;s</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Image break 1 --}}
  <div class="image-break" style="background-image:url('{{ image_url($page->blockByKey('image_break_1')?->get('image'), 'assets/img/extra/extra-13.jpg') }}')">
    <div class="image-break-text">
      <h3>{!! $page->blockByKey('image_break_1')?->get('title', 'Moda, cultura y experiencia') !!}</h3>
      <p>{{ $page->blockByKey('image_break_1')?->get('subtitle', 'Donde cada detalle cuenta una historia') }}</p>
    </div>
  </div>

  {{-- Services --}}
  <section>
    <div class="container">
      <p class="section-label reveal">Nuestros Servicios</p>
      <h2 class="section-title reveal">Excelencia en cada disciplina</h2>
    </div>
    <div class="services-visual-grid reveal">
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
    </div>
  </section>

  {{-- Image break 2 --}}
  <div class="image-break" style="background-image:url('/assets/img/eventos/eventos-09.jpg')">
    <div class="image-break-text">
      <h3>Cada proyecto, una nueva visi&oacute;n</h3>
      <p>Moda &middot; Identidades &middot; Experiencias</p>
    </div>
  </div>

  {{-- Portfolio teaser --}}
  <section class="bg-dark">
    <div class="container">
      <p class="section-label reveal">Portfolio</p>
      <h2 class="section-title reveal">Proyectos seleccionados</h2>
    </div>
    <div class="portfolio-grid reveal">
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
    </div>
    <div style="text-align:center; margin-top: 3rem;">
      <a href="{{ route('page', 'portfolio') }}" class="btn btn-light">Ver todo el portfolio</a>
    </div>
  </section>

  {{-- CTA --}}
  <section>
    <div class="cta-block">
      <p class="section-label">Hablemos</p>
      <h2 class="section-title">&iquest;Tienes un proyecto<br>en mente?</h2>
      <p>Estamos listos para escucharte. Cada gran proyecto empieza con una conversaci&oacute;n.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Cont&aacute;ctanos</a>
    </div>
  </section>

@endsection
