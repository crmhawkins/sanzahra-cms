@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero'); @endphp
  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($hero?->get('background_image'), 'assets/img/branding/branding-05.jpg') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">{!! $hero?->get('kicker', 'Branding &amp; Marketing') !!}</p>
      <h1>{!! $hero?->get('title', 'La marca<br>como arquitectura') !!}</h1>
      <p class="subtitle">{!! $hero?->get('subtitle', 'Construimos identidades que perduran. Estrategia, s&iacute;mbolo y narrativa al servicio de una visi&oacute;n.') !!}</p>
    </div>
  </section>

  @php $breadcrumb = $page->blockByKey('breadcrumb')?->get('items', []); @endphp
  @if($breadcrumb)
    <nav class="breadcrumb">
      @foreach($breadcrumb as $i => $crumb)
        @if(!empty($crumb['url']))<a href="{{ nav_url($crumb['url']) }}">{{ $crumb['label'] ?? '' }}</a>@else{{ $crumb['label'] ?? '' }}@endif
        @if(!$loop->last) <span>/</span> @endif
      @endforeach
    </nav>
  @else
    <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Branding</nav>
  @endif

  @php $intro = $page->blockByKey('intro'); $introTags = $intro?->get('tags', []); @endphp
  <section>
    <div class="container">
      <div class="two-col">
        <div>
          <p class="section-label reveal">{{ $intro?->get('section_label', 'Identidad y estrategia') }}</p>
          <h2 class="section-title reveal">{!! $intro?->get('title', 'Marcas que se<br>recuerdan') !!}</h2>
          <p class="section-text reveal">{!! $intro?->get('paragraph_1', 'Una marca no es un logotipo: es una arquitectura. Es la suma de decisiones, s&iacute;mbolos y silencios que configuran la manera en que el mundo te percibe. En SANZAHRA dise&ntilde;amos esa arquitectura desde el fundamento, con la paciencia de quien sabe que lo duradero no se improvisa.') !!}</p>
          <p class="section-text reveal">{!! $intro?->get('paragraph_2', 'Trabajamos desde el concepto estrat&eacute;gico hasta la ejecuci&oacute;n visual, atendiendo cada punto de contacto con el mismo nivel de cuidado. El resultado son marcas coherentes, memorables y profundamente humanas.') !!}</p>
          <div class="tag-list reveal">
            @if($introTags)
              @foreach($introTags as $tag)
                <span class="tag">{{ $tag }}</span>
              @endforeach
            @else
              <span class="tag">Identidad Visual</span>
              <span class="tag">Estrategia de Marca</span>
              <span class="tag">Naming</span>
              <span class="tag">Manual de marca</span>
              <span class="tag">Comunicaci&oacute;n digital</span>
              <span class="tag">Contenido editorial</span>
              <span class="tag">Publicidad</span>
            @endif
          </div>
        </div>
        <div class="two-col-image reveal" style="background-image:url('{{ image_url($intro?->get('image'), 'assets/img/branding/branding-08.jpg') }}')"></div>
      </div>
    </div>
  </section>

  @php $featuresBlock = $page->blockByKey('features'); $features = $featuresBlock?->get('features', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $featuresBlock?->get('section_label', 'Qué incluye') }}</p>
      <h2 class="section-title reveal">{!! $featuresBlock?->get('title', 'Un sistema<br>completo de marca') !!}</h2>
    </div>
    <div class="features reveal">
      @if($features)
        @foreach($features as $feature)
          <div class="feature">
            <h4>{{ $feature['title'] ?? '' }}</h4>
            <p>{{ $feature['description'] ?? '' }}</p>
          </div>
        @endforeach
      @else
        <div class="feature">
          <h4>Identidad coherente</h4>
          <p>Un sistema visual y verbal unificado, dise&ntilde;ado para sostener la marca en cada canal y formato, desde lo editorial hasta lo digital.</p>
        </div>
        <div class="feature">
          <h4>Posicionamiento claro</h4>
          <p>Definimos el lugar que tu marca ocupa en la mente del p&uacute;blico. Un territorio propio, reconocible y defendible frente a la competencia.</p>
        </div>
        <div class="feature">
          <h4>Narrativa de marca</h4>
          <p>Construimos el relato que conecta con tus audiencias. Una historia aut&eacute;ntica, con voz propia, capaz de trascender campa&ntilde;as y temporadas.</p>
        </div>
      @endif
    </div>
  </section>

  @php $imageBreak = $page->blockByKey('image_break'); @endphp
  <div class="image-break" style="background-image:url('{{ image_url($imageBreak?->get('image'), 'assets/img/extra/extra-16.jpg') }}')">
    <div class="image-break-text">
      <h3>{!! $imageBreak?->get('heading', 'Una marca no se dise&ntilde;a: se construye') !!}</h3>
      <p>{{ $imageBreak?->get('subheading', 'Con tiempo, con criterio y con visión') }}</p>
    </div>
  </div>

  @php $proceso = $page->blockByKey('proceso'); $steps = $proceso?->get('steps', []); @endphp
  <section>
    <div class="container">
      <p class="section-label reveal">{{ $proceso?->get('section_label', 'Nuestro proceso') }}</p>
      <h2 class="section-title reveal">{!! $proceso?->get('title', 'De la intuici&oacute;n<br>al sistema') !!}</h2>
    </div>
    <div class="process-grid reveal">
      @if($steps)
        @foreach($steps as $step)
          <div class="process-step"><div class="step-num">{{ $step['number'] ?? '' }}</div><h4>{{ $step['title'] ?? '' }}</h4><p>{{ $step['description'] ?? '' }}</p></div>
        @endforeach
      @else
        <div class="process-step"><div class="step-num">01</div><h4>Discovery</h4><p>Escuchamos, investigamos y entendemos el contexto, la historia y las aspiraciones de la marca.</p></div>
        <div class="process-step"><div class="step-num">02</div><h4>Estrategia</h4><p>Definimos el posicionamiento, el territorio conceptual y los pilares narrativos que sostendr&aacute;n la identidad.</p></div>
        <div class="process-step"><div class="step-num">03</div><h4>Dise&ntilde;o</h4><p>Traducimos la estrategia en un sistema visual y verbal: logotipo, tipograf&iacute;a, color, voz y c&oacute;digos propios.</p></div>
        <div class="process-step"><div class="step-num">04</div><h4>Implementaci&oacute;n</h4><p>Desplegamos la marca en todos los puntos de contacto y entregamos las herramientas para su uso coherente.</p></div>
      @endif
    </div>
  </section>

  @php $galleryBlock = $page->blockByKey('gallery'); $galleryItems = $galleryBlock?->get('items', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $galleryBlock?->get('section_label', 'Trabajos seleccionados') }}</p>
      <h2 class="section-title reveal">{!! $galleryBlock?->get('title', 'Identidades<br>recientes') !!}</h2>
    </div>
    <div class="gallery reveal">
      @if($galleryItems)
        @foreach($galleryItems as $item)
          <div class="gallery-item" style="background-image:url('{{ image_url($item['image'] ?? null) }}')"></div>
        @endforeach
      @else
        <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-39-modelo-flores-rojas.jpg')"></div>
        <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-34-ilustraciones-rosa.jpg')"></div>
        <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-25-bocetos.jpg')"></div>
      @endif
    </div>
  </section>

  @php $partner = $page->blockByKey('partner'); @endphp
  <section class="partner-section">
    <div class="container reveal">
      <div class="partner-card">
        <p class="section-label" style="color: rgba(255,255,255,.5);">{{ $partner?->get('section_label', 'Partner estratégico') }}</p>
        <h2 class="section-title" style="color: var(--white);">{!! $partner?->get('title', 'En colaboraci&oacute;n con<br>Hawkins') !!}</h2>
        <p class="partner-desc">{!! $partner?->get('description', 'Nuestra divisi&oacute;n de branding y marketing se desarrolla en colaboraci&oacute;n con <strong>Hawkins</strong>, agencia de referencia en estrategia de marca, marketing digital y comunicaci&oacute;n. Una alianza que une la visi&oacute;n creativa de SANZAHRA con la experiencia de una agencia consolidada en el sector.') !!}</p>
        <a href="{{ nav_url($partner?->get('button_url', 'https://hawkins.es')) }}" target="_blank" rel="noopener" class="btn btn-light">{!! $partner?->get('button_text', 'Visitar hawkins.es &rarr;') !!}</a>
      </div>
    </div>
  </section>

  @php $cta = $page->blockByKey('cta_final'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Empecemos') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', 'Construyamos<br>tu marca') !!}</h2>
      <p>{{ $cta?->get('description', 'Solicita una consulta inicial gratuita. Estudiamos tu caso y te proponemos el enfoque más adecuado para tu proyecto de marca.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Contactar') }}</a>
    </div>
  </section>

@endsection
