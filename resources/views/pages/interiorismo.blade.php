@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero'); @endphp
  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($hero?->get('background_image'), null) ?? 'https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=1920&q=80' }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">{{ $hero?->get('kicker', 'Interiorismo') }}</p>
      <h1>{!! $hero?->get('title', 'Los espacios<br>hablan de nosotros') !!}</h1>
      <p class="subtitle">{!! $hero?->get('subtitle', 'Proyectos residenciales de alta gama, hoteler&iacute;a boutique y 5 estrellas, y producci&oacute;n de stands con alma.') !!}</p>
    </div>
  </section>

  @php $breadcrumb = $page->blockByKey('breadcrumb'); $crumbs = $breadcrumb?->get('items', []); @endphp
  <nav class="breadcrumb">
    @if($crumbs)
      @foreach($crumbs as $i => $crumb)
        @if(!$loop->last)<a href="{{ nav_url($crumb['url'] ?? '/') }}">{!! $crumb['label'] ?? '' !!}</a> <span>/</span> @else{!! $crumb['label'] ?? '' !!}@endif
      @endforeach
    @else
      <a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Interiorismo
    @endif
  </nav>

  @php $intro = $page->blockByKey('intro'); $introTags = $intro?->get('tags', []); @endphp
  <section>
    <div class="container">
      <div class="two-col">
        <div>
          <p class="section-label reveal">{{ $intro?->get('section_label', 'Diseño de espacios') }}</p>
          <h2 class="section-title reveal">{!! $intro?->get('title', 'El espacio<br>como retrato') !!}</h2>
          <p class="section-text reveal">{!! $intro?->get('paragraph_1', 'Un espacio bien dise&ntilde;ado no se impone: se habita. Cuenta qui&eacute;n vive, qui&eacute;n recibe, qui&eacute;n trabaja dentro de &eacute;l. En SANZAHRA concebimos el interiorismo como un ejercicio de escucha: entender la vida que suceder&aacute; entre esas paredes antes de proponer un solo material.') !!}</p>
          <p class="section-text reveal">{!! $intro?->get('paragraph_2', 'Desde residencias privadas de alta gama hasta hoteles boutique y cinco estrellas, pasando por producci&oacute;n y construcci&oacute;n de stands, cada proyecto se aborda con rigor t&eacute;cnico y sensibilidad est&eacute;tica.') !!}</p>
          <div class="tag-list reveal">
            @if($introTags)
              @foreach($introTags as $tag)
                <span class="tag">{!! $tag !!}</span>
              @endforeach
            @else
              <span class="tag">Residencial</span>
              <span class="tag">Hoteler&iacute;a boutique</span>
              <span class="tag">Hoteler&iacute;a 5 estrellas</span>
              <span class="tag">Stand Builder</span>
              <span class="tag">Event Producer</span>
              <span class="tag">Retail</span>
            @endif
          </div>
        </div>
        <div class="two-col-image reveal" style="background-image:url('{{ image_url($intro?->get('image'), null) ?? 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?w=800&q=80' }}')"></div>
      </div>
    </div>
  </section>

  @php $features = $page->blockByKey('features'); $featureItems = $features?->get('features', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $features?->get('section_label', 'Qué incluye') }}</p>
      <h2 class="section-title reveal">{!! $features?->get('title', 'Tres &aacute;mbitos,<br>una misma exigencia') !!}</h2>
    </div>
    <div class="features reveal">
      @if($featureItems)
        @foreach($featureItems as $feature)
          <div class="feature">
            <h4>{!! $feature['title'] ?? '' !!}</h4>
            <p>{!! $feature['description'] ?? '' !!}</p>
          </div>
        @endforeach
      @else
        <div class="feature">
          <h4>Residencial</h4>
          <p>Viviendas, &aacute;ticos y residencias de alta gama dise&ntilde;adas a medida, donde cada decisi&oacute;n responde al modo de vida de quien las habita.</p>
        </div>
        <div class="feature">
          <h4>Hotelero</h4>
          <p>Proyectos de hoteler&iacute;a boutique y 5 estrellas. Creamos atm&oacute;sferas que convierten la estancia en una experiencia memorable.</p>
        </div>
        <div class="feature">
          <h4>Event Producer &amp; Stand Builder</h4>
          <p>Dise&ntilde;o y construcci&oacute;n de stands y espacios ef&iacute;meros para ferias, showrooms y eventos corporativos de alto nivel.</p>
        </div>
      @endif
    </div>
  </section>

  @php $imageBreak = $page->blockByKey('image_break'); @endphp
  <div class="image-break" style="background-image:url('{{ image_url($imageBreak?->get('image'), null) ?? 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&q=80' }}')">
    <div class="image-break-text">
      <h3>{!! $imageBreak?->get('heading', 'Los espacios no se decoran: se escriben') !!}</h3>
      <p>{!! $imageBreak?->get('subheading', 'Con luz, con materia, con tiempo') !!}</p>
    </div>
  </div>

  @php $proceso = $page->blockByKey('proceso'); $steps = $proceso?->get('steps', []); @endphp
  <section>
    <div class="container">
      <p class="section-label reveal">{{ $proceso?->get('section_label', 'Nuestro proceso') }}</p>
      <h2 class="section-title reveal">{!! $proceso?->get('title', 'Del plano<br>a la key del proyecto') !!}</h2>
    </div>
    <div class="process-grid reveal">
      @if($steps)
        @foreach($steps as $step)
          <div class="process-step"><div class="step-num">{!! $step['number'] ?? '' !!}</div><h4>{!! $step['title'] ?? '' !!}</h4><p>{!! $step['description'] ?? '' !!}</p></div>
        @endforeach
      @else
        <div class="process-step"><div class="step-num">01</div><h4>An&aacute;lisis del espacio</h4><p>Estudio del lugar, la luz, la circulaci&oacute;n y el contexto. Escuchamos al cliente y al edificio.</p></div>
        <div class="process-step"><div class="step-num">02</div><h4>Concepto y mood</h4><p>Definimos la atm&oacute;sfera, la paleta de materiales y el relato est&eacute;tico que guiar&aacute; cada decisi&oacute;n.</p></div>
        <div class="process-step"><div class="step-num">03</div><h4>Desarrollo t&eacute;cnico</h4><p>Planos de detalle, mobiliario a medida, iluminaci&oacute;n y especificaciones constructivas listos para obra.</p></div>
        <div class="process-step"><div class="step-num">04</div><h4>Ejecuci&oacute;n y key</h4><p>Direcci&oacute;n de obra, supervisi&oacute;n de proveedores y entrega llave en mano del proyecto terminado.</p></div>
      @endif
    </div>
  </section>

  @php $gallery = $page->blockByKey('gallery'); $galleryItems = $gallery?->get('items', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $gallery?->get('section_label', 'Proyectos seleccionados') }}</p>
      <h2 class="section-title reveal">{!! $gallery?->get('title', 'Interiores<br>recientes') !!}</h2>
    </div>
    <div class="gallery reveal">
      @if($galleryItems)
        @foreach($galleryItems as $item)
          <div class="gallery-item" style="background-image:url('{{ image_url($item['image'] ?? null) }}')"></div>
        @endforeach
      @else
        <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1600210492493-0946911123ea?w=600&q=80')"></div>
        <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1615873968403-89e068629265?w=600&q=80')"></div>
        <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&q=80')"></div>
      @endif
    </div>
  </section>

  @php $cta = $page->blockByKey('cta_final'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Empecemos') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', 'Dise&ntilde;emos<br>tu espacio') !!}</h2>
      <p>{{ $cta?->get('description', 'Solicita una consulta inicial gratuita. Visitamos el lugar, escuchamos tu visión y te proponemos un enfoque a medida.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Contactar') }}</a>
    </div>
  </section>

@endsection
