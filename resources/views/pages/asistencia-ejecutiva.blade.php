@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero'); @endphp
  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($hero?->get('background_image'), null) ?? 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=80' }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">{{ $hero?->get('kicker', 'Asistencia Ejecutiva') }}</p>
      <h1>{!! $hero?->get('title', 'El lujo<br>del tiempo') !!}</h1>
      <p class="subtitle">{!! $hero?->get('subtitle', 'Servicio concierge integral para empresas y ejecutivos de alto nivel. Nos ocupamos de todo lo que no tiene tiempo.') !!}</p>
    </div>
  </section>

  @php $breadcrumb = $page->blockByKey('breadcrumb'); $crumbs = $breadcrumb?->get('items', []); @endphp
  <nav class="breadcrumb">
    @if($crumbs)
      @foreach($crumbs as $i => $crumb)
        @if(!$loop->last)<a href="{{ nav_url($crumb['url'] ?? '/') }}">{!! $crumb['label'] ?? '' !!}</a> <span>/</span> @else{!! $crumb['label'] ?? '' !!}@endif
      @endforeach
    @else
      <a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Asistencia Ejecutiva
    @endif
  </nav>

  @php $intro = $page->blockByKey('intro'); $introTags = $intro?->get('tags', []); @endphp
  <section>
    <div class="two-col">
      <div>
        <p class="section-label reveal">{{ $intro?->get('section_label', 'Disciplina') }}</p>
        <h2 class="section-title reveal">{!! $intro?->get('title', 'Discreci&oacute;n absoluta,<br>eficacia total') !!}</h2>
        <p class="section-text reveal">{!! $intro?->get('paragraph_1', 'Tu tiempo es el activo m&aacute;s valioso que posees. Nuestro servicio de asistencia ejecutiva se dise&ntilde;a para devolvert&eacute;lo. Gestionamos agendas, viajes, reservas, imprevistos, b&uacute;squeda de recursos especializados y coordinaci&oacute;n de equipos con la m&aacute;xima profesionalidad.') !!}</p>
        <p class="section-text reveal">{!! $intro?->get('paragraph_2', 'Trabajamos con empresas y perfiles ejecutivos que exigen excelencia, rapidez y discreci&oacute;n absoluta. Un servicio silencioso, siempre disponible, que anticipa antes de que t&uacute; pidas.') !!}</p>
        <div class="tag-list reveal">
          @if($introTags)
            @foreach($introTags as $tag)
              <span class="tag">{!! $tag !!}</span>
            @endforeach
          @else
            <span class="tag">Concierge</span>
            <span class="tag">Agenda</span>
            <span class="tag">Viajes</span>
            <span class="tag">Discreci&oacute;n</span>
          @endif
        </div>
      </div>
      <div class="two-col-image reveal" style="background-image:url('{{ image_url($intro?->get('image'), null) ?? 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80' }}')"></div>
    </div>
  </section>

  @php $features = $page->blockByKey('features'); $featureItems = $features?->get('features', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $features?->get('section_label', 'Qué incluye') }}</p>
      <h2 class="section-title reveal">{!! $features?->get('title', '&Aacute;reas<br>de trabajo') !!}</h2>
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
          <h4>Concierge empresarial</h4>
          <p>Reservas, gestiones, b&uacute;squeda de recursos especializados y atenci&oacute;n a imprevistos. Un interlocutor &uacute;nico disponible cuando lo necesitas.</p>
        </div>
        <div class="feature">
          <h4>Gesti&oacute;n integral</h4>
          <p>Agenda, viajes corporativos, alojamientos, transportes y log&iacute;stica cotidiana resuelta con previsi&oacute;n y criterio.</p>
        </div>
        <div class="feature">
          <h4>Coordinaci&oacute;n ejecutiva</h4>
          <p>Interlocuci&oacute;n con equipos internos, proveedores y colaboradores externos. Hacemos que todo se mueva al ritmo que necesitas.</p>
        </div>
      @endif
    </div>
  </section>

  @php $imageBreak = $page->blockByKey('image_break'); @endphp
  <div class="image-break" style="background-image:url('{{ image_url($imageBreak?->get('image'), null) ?? 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=1920&q=80' }}')">
    <div class="image-break-text">
      <h3>{!! $imageBreak?->get('heading', '&laquo;El verdadero lujo<br>es tener tiempo&raquo;') !!}</h3>
      <p>{!! $imageBreak?->get('subheading', 'Nos ocupamos de los detalles para que t&uacute; te ocupes de lo esencial') !!}</p>
    </div>
  </div>

  @php $proceso = $page->blockByKey('proceso'); $steps = $proceso?->get('steps', []); @endphp
  <section>
    <div class="container">
      <p class="section-label reveal">{{ $proceso?->get('section_label', 'Nuestro proceso') }}</p>
      <h2 class="section-title reveal">{!! $proceso?->get('title', 'C&oacute;mo trabajamos') !!}</h2>
    </div>
    <div class="process-grid reveal">
      @if($steps)
        @foreach($steps as $step)
          <div class="process-step"><div class="step-num">{!! $step['number'] ?? '' !!}</div><h4>{!! $step['title'] ?? '' !!}</h4><p>{!! $step['description'] ?? '' !!}</p></div>
        @endforeach
      @else
        <div class="process-step"><div class="step-num">01</div><h4>Alta del servicio</h4><p>Formalizamos el acuerdo con absoluta confidencialidad y establecemos los canales de comunicaci&oacute;n seguros.</p></div>
        <div class="process-step"><div class="step-num">02</div><h4>Definici&oacute;n de necesidades</h4><p>Entrevista inicial para entender tu d&iacute;a a d&iacute;a, tus preferencias, tus est&aacute;ndares y los puntos cr&iacute;ticos a cubrir.</p></div>
        <div class="process-step"><div class="step-num">03</div><h4>Asignaci&oacute;n de asistente</h4><p>Designamos un profesional dedicado, con perfil y experiencia alineados con tu sector y tus exigencias.</p></div>
        <div class="process-step"><div class="step-num">04</div><h4>Seguimiento continuo</h4><p>Revisi&oacute;n peri&oacute;dica del servicio, ajustes y mejoras. Nos adaptamos a la evoluci&oacute;n de tus necesidades.</p></div>
      @endif
    </div>
  </section>

  @php $gallery = $page->blockByKey('gallery'); $galleryItems = $gallery?->get('items', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $gallery?->get('section_label', 'Visual') }}</p>
      <h2 class="section-title reveal">{!! $gallery?->get('title', 'Inspiraci&oacute;n') !!}</h2>
    </div>
    <div class="gallery reveal">
      @if($galleryItems)
        @foreach($galleryItems as $item)
          <div class="gallery-item" style="background-image:url('{{ image_url($item['image'] ?? null) }}')"></div>
        @endforeach
      @else
        <div class="gallery-item" style="background-image:url('/assets/img/branding/branding-04.jpg')"></div>
        <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-40-vestido-ondas-blanco.jpg')"></div>
        <div class="gallery-item" style="background-image:url('/assets/img/extra/extra-11.jpg')"></div>
      @endif
    </div>
  </section>

  @php $cta = $page->blockByKey('cta_final'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Empecemos') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', 'Recupera<br>tu tiempo') !!}</h2>
      <p>{{ $cta?->get('description', 'Agenda una conversación confidencial. Te explicaremos cómo podemos integrarnos en tu día a día desde el primer momento.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Contactar') }}</a>
    </div>
  </section>

@endsection
