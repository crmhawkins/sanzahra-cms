@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero'); @endphp
  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($hero?->get('background_image'), 'assets/img/eventos/eventos-13-pasarela-flores.jpg') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">{{ $hero?->get('kicker', 'Producción de Eventos') }}</p>
      <h1>{!! $hero?->get('title', 'Pasarela<br>de Moda') !!}</h1>
      <p class="subtitle">{!! $hero?->get('subtitle', 'Producci&oacute;n integral de pasarelas, desfiles y eventos de moda. Del casting a la &uacute;ltima luz, del croquis al aplauso final.') !!}</p>
    </div>
  </section>

  @php $breadcrumb = $page->blockByKey('breadcrumb'); $crumbs = $breadcrumb?->get('items', []); @endphp
  <nav class="breadcrumb">
    @if($crumbs)
      @foreach($crumbs as $i => $crumb)
        @if(!$loop->last)<a href="{{ nav_url($crumb['url'] ?? '/') }}">{!! $crumb['label'] ?? '' !!}</a> <span>/</span> @else{!! $crumb['label'] ?? '' !!}@endif
      @endforeach
    @else
      <a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Producci&oacute;n de Eventos
    @endif
  </nav>

  @php $intro = $page->blockByKey('intro'); $introTags = $intro?->get('tags', []); @endphp
  <section>
    <div class="two-col">
      <div>
        <p class="section-label reveal">{{ $intro?->get('section_label', 'Disciplina') }}</p>
        <h2 class="section-title reveal">{!! $intro?->get('title', 'Experiencias<br>que se recuerdan') !!}</h2>
        <p class="section-text reveal">{!! $intro?->get('paragraph_1', 'Un desfile no es solo el paseo de una colecci&oacute;n: es el momento en el que una marca dice qui&eacute;n es. En SANZAHRA producimos pasarelas, presentaciones y eventos de moda concebidos como experiencias narrativas completas, donde cada modelo, cada luz y cada segundo cuenta la misma historia.') !!}</p>
        <p class="section-text reveal">{!! $intro?->get('paragraph_2', 'Nos especializamos exclusivamente en el universo de la moda: pasarelas, desfiles, editoriales en vivo, presentaciones de colecci&oacute;n y lanzamientos de marca. Coordinamos direcci&oacute;n creativa, casting, escenograf&iacute;a, t&eacute;cnica, m&uacute;sica y comunicaci&oacute;n bajo una sola mirada.') !!}</p>
        <div class="tag-list reveal">
          @if($introTags)
            @foreach($introTags as $tag)
              <span class="tag">{!! $tag !!}</span>
            @endforeach
          @else
            <span class="tag">Pasarelas</span>
            <span class="tag">Desfiles</span>
            <span class="tag">Presentaciones de colecci&oacute;n</span>
            <span class="tag">Lanzamientos de marca</span>
            <span class="tag">Editoriales en vivo</span>
          @endif
        </div>
      </div>
      <div class="two-col-image reveal" style="background-image:url('{{ image_url($intro?->get('image'), 'assets/img/moda/moda-24-editorial-bw.jpg') }}')"></div>
    </div>
  </section>

  @php $features = $page->blockByKey('features'); $featureItems = $features?->get('features', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $features?->get('section_label', 'Qué hacemos') }}</p>
      <h2 class="section-title reveal">{!! $features?->get('title', 'Del croquis<br>al aplauso final') !!}</h2>
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
          <h4>Pasarelas y desfiles</h4>
          <p>Producci&oacute;n integral de pasarelas para marcas consolidadas, emergentes y marcas propias. Direcci&oacute;n creativa, casting, coreograf&iacute;a y t&eacute;cnica.</p>
        </div>
        <div class="feature">
          <h4>Presentaciones de colecci&oacute;n</h4>
          <p>Formatos alternativos al desfile tradicional: static shows, fashion films, presentaciones inmersivas y performances editoriales.</p>
        </div>
        <div class="feature">
          <h4>Lanzamientos de marca</h4>
          <p>Eventos de lanzamiento para marcas de moda: fiestas de presentaci&oacute;n, pop-ups experienciales y activaciones editoriales.</p>
        </div>
      @endif
    </div>
  </section>

  @php $imageBreak = $page->blockByKey('image_break'); @endphp
  <div class="image-break" style="background-image:url('{{ image_url($imageBreak?->get('image'), 'assets/img/eventos/eventos-14-pasarela-flores.jpg') }}')">
    <div class="image-break-text">
      <h3>{!! $imageBreak?->get('heading', '&laquo;Una pasarela no se improvisa:<br>se dirige&raquo;') !!}</h3>
      <p>{!! $imageBreak?->get('subheading', 'Cada paso es una decisi&oacute;n creativa') !!}</p>
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
        <div class="process-step"><div class="step-num">01</div><h4>Concepto</h4><p>Direcci&oacute;n creativa, narrativa del desfile, mood y universo visual que dar&aacute; forma a la experiencia.</p></div>
        <div class="process-step"><div class="step-num">02</div><h4>Casting y coreograf&iacute;a</h4><p>Selecci&oacute;n de modelos, prueba de estilismo, orden de salida y coreograf&iacute;a espec&iacute;fica para cada look.</p></div>
        <div class="process-step"><div class="step-num">03</div><h4>Escenograf&iacute;a y t&eacute;cnica</h4><p>Dise&ntilde;o de pasarela, iluminaci&oacute;n, m&uacute;sica, sonido y backstage. Todo lo que se ve y lo que no.</p></div>
        <div class="process-step"><div class="step-num">04</div><h4>Show time</h4><p>Direcci&oacute;n el d&iacute;a del desfile: control absoluto desde backstage. De la primera salida al saludo final.</p></div>
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
        <div class="gallery-item" style="background-image:url('/assets/img/eventos/eventos-16-vestido-blanco-pasarela.jpg')"></div>
        <div class="gallery-item" style="background-image:url('/assets/img/eventos/eventos-15-pasarela-flores2.jpg')"></div>
        <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-29-editorial-blur.jpg')"></div>
      @endif
    </div>
  </section>

  @php $cta = $page->blockByKey('cta_final'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Empecemos') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', '&iquest;Tienes una pasarela<br>o desfile en mente?') !!}</h2>
      <p>{{ $cta?->get('description', 'Cuéntanos tu colección, la fecha y tu visión. Te propondremos un concepto a medida.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Contactar') }}</a>
    </div>
  </section>

@endsection
