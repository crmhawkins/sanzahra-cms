@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero'); @endphp
  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($hero?->get('background_image'), 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=1920&q=80') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">{!! $hero?->get('kicker', 'Arquitectura') !!}</p>
      <h1>{!! $hero?->get('title', 'Arquitectura<br>como lenguaje') !!}</h1>
      <p class="subtitle">{!! $hero?->get('subtitle', 'Proyectamos espacios que comunican, cuidan y perduran. Desde la arquitectura corporativa hasta la ef&iacute;mera, cada obra es una declaraci&oacute;n de identidad.') !!}</p>
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
    <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Arquitectura</nav>
  @endif

  @php $intro = $page->blockByKey('intro'); $introTags = $intro?->get('tags', []); @endphp
  <section>
    <div class="two-col">
      <div>
        <p class="section-label reveal">{{ $intro?->get('section_label', 'Disciplina') }}</p>
        <h2 class="section-title reveal">{!! $intro?->get('title', 'Tres escalas,<br>una misma visi&oacute;n') !!}</h2>
        <p class="section-text reveal">{!! $intro?->get('paragraph_1', 'Entendemos la arquitectura como un lenguaje capaz de expresar los valores de una marca, acoger la vida de las personas y crear atm&oacute;sferas temporales memorables. Trabajamos en tres dimensiones complementarias: la arquitectura conceptual para corporaciones, la arquitectura neuronal que dise&ntilde;a espacios pensados para la experiencia humana y el bienestar, y la arquitectura ef&iacute;mera que da forma a eventos y activaciones de marca.') !!}</p>
        <p class="section-text reveal">{!! $intro?->get('paragraph_2', 'Cada proyecto nace de una escucha atenta al cliente, al lugar y al prop&oacute;sito. Desde ah&iacute; construimos espacios coherentes, bellos y profundamente humanos.') !!}</p>
        <div class="tag-list reveal">
          @if($introTags)
            @foreach($introTags as $tag)
              <span class="tag">{{ $tag }}</span>
            @endforeach
          @else
            <span class="tag">Corporativa</span>
            <span class="tag">Neuronal</span>
            <span class="tag">Ef&iacute;mera</span>
            <span class="tag">Bienestar</span>
          @endif
        </div>
      </div>
      <div class="two-col-image reveal" style="background-image:url('{{ image_url($intro?->get('image'), 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=800&q=80') }}')"></div>
    </div>
  </section>

  @php $featuresBlock = $page->blockByKey('features'); $features = $featuresBlock?->get('features', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $featuresBlock?->get('section_label', 'Qué incluye') }}</p>
      <h2 class="section-title reveal">{!! $featuresBlock?->get('title', '&Aacute;reas<br>de trabajo') !!}</h2>
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
          <h4>Conceptual corporativa</h4>
          <p>Sedes, oficinas y espacios corporativos que traducen la identidad de la marca en arquitectura. Cada l&iacute;nea comunica.</p>
        </div>
        <div class="feature">
          <h4>Neuronal (espacios que cuidan)</h4>
          <p>Arquitectura dise&ntilde;ada a partir del bienestar: luz, ac&uacute;stica, materiales y proporciones al servicio de la experiencia humana.</p>
        </div>
        <div class="feature">
          <h4>Ef&iacute;mera para eventos</h4>
          <p>Estructuras, pabellones y activaciones temporales que convierten un espacio en una experiencia &uacute;nica durante el tiempo necesario.</p>
        </div>
      @endif
    </div>
  </section>

  @php $imageBreak = $page->blockByKey('image_break'); @endphp
  <div class="image-break" style="background-image:url('{{ image_url($imageBreak?->get('image'), 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=1920&q=80') }}')">
    <div class="image-break-text">
      <h3>{!! $imageBreak?->get('heading', '&laquo;La arquitectura es la decisi&oacute;n<br>de c&oacute;mo queremos vivir&raquo;') !!}</h3>
      <p>{{ $imageBreak?->get('subheading', 'Diseñamos el marco de las experiencias importantes') }}</p>
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
          <div class="process-step"><div class="step-num">{{ $step['number'] ?? '' }}</div><h4>{{ $step['title'] ?? '' }}</h4><p>{{ $step['description'] ?? '' }}</p></div>
        @endforeach
      @else
        <div class="process-step"><div class="step-num">01</div><h4>An&aacute;lisis del emplazamiento</h4><p>Estudiamos el lugar, su luz, su orientaci&oacute;n, su contexto y sus limitaciones. Todo proyecto empieza por escuchar el sitio.</p></div>
        <div class="process-step"><div class="step-num">02</div><h4>Concepto arquitect&oacute;nico</h4><p>Definimos la idea rectora: la forma, los materiales, la atm&oacute;sfera. Un relato que gu&iacute;a todas las decisiones posteriores.</p></div>
        <div class="process-step"><div class="step-num">03</div><h4>Desarrollo de planos</h4><p>Documentaci&oacute;n t&eacute;cnica completa: planos, memorias, detalles constructivos y mediciones listas para obra.</p></div>
        <div class="process-step"><div class="step-num">04</div><h4>Direcci&oacute;n de obra</h4><p>Acompa&ntilde;amos la ejecuci&oacute;n en cada fase, garantizando que lo construido sea fiel al proyecto y a su esp&iacute;ritu.</p></div>
      @endif
    </div>
  </section>

  @php $galleryBlock = $page->blockByKey('gallery'); $galleryItems = $galleryBlock?->get('items', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $galleryBlock?->get('section_label', 'Visual') }}</p>
      <h2 class="section-title reveal">{!! $galleryBlock?->get('title', 'Inspiraci&oacute;n') !!}</h2>
    </div>
    <div class="gallery reveal">
      @if($galleryItems)
        @foreach($galleryItems as $item)
          <div class="gallery-item" style="background-image:url('{{ image_url($item['image'] ?? null) }}')"></div>
        @endforeach
      @else
        <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80')"></div>
        <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1511818966892-d7d671e672a2?w=800&q=80')"></div>
        <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1496564203457-11bb12075d90?w=800&q=80')"></div>
      @endif
    </div>
  </section>

  @php $partner = $page->blockByKey('partner'); @endphp
  <section class="partner-section">
    <div class="container reveal">
      <div class="partner-card">
        <p class="section-label" style="color: rgba(255,255,255,.5);">{{ $partner?->get('section_label', 'Partner') }}</p>
        <h2 class="section-title" style="color: var(--white);">{!! $partner?->get('title', 'En colaboraci&oacute;n con<br>Sumnomatec') !!}</h2>
        <p class="partner-desc">{!! $partner?->get('description', 'Los proyectos de arquitectura de SANZAHRA se desarrollan junto a <strong>Sumnomatec</strong>, nuestro estudio partner especializado en arquitectura t&eacute;cnica, direcci&oacute;n de obra y soluciones constructivas avanzadas. Una alianza que une visi&oacute;n creativa y rigor t&eacute;cnico.') !!}</p>
        <a href="{{ nav_url($partner?->get('button_url', 'https://sumnomatec.com')) }}" target="_blank" rel="noopener" class="btn btn-light">{!! $partner?->get('button_text', 'Visitar sumnomatec.com &rarr;') !!}</a>
      </div>
    </div>
  </section>

  @php $cta = $page->blockByKey('cta_final'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Empecemos') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', '&iquest;Tienes un proyecto<br>arquitect&oacute;nico?') !!}</h2>
      <p>{{ $cta?->get('description', 'Escríbenos y cuéntanos tu visión. Estudiamos el emplazamiento y te proponemos un enfoque a medida.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Contactar') }}</a>
    </div>
  </section>

@endsection
