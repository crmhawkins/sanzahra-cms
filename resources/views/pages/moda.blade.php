@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero'); @endphp
  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($hero?->get('background_image'), 'assets/img/moda/moda-24-editorial-bw.jpg') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">{{ $hero?->get('kicker', 'Moda') }}</p>
      <h1>{!! $hero?->get('title', 'La moda<br>como forma de cultura') !!}</h1>
      <p class="subtitle">{!! $hero?->get('subtitle', 'Creaci&oacute;n de marcas, producci&oacute;n de desfiles y gesti&oacute;n de talento. Vestir ideas antes que cuerpos.') !!}</p>
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
    <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Moda</nav>
  @endif

  @php $intro = $page->blockByKey('intro'); @endphp
  <section>
    <div class="container">
      <div class="two-col">
        <div>
          <p class="section-label reveal">{{ $intro?->get('section_label', 'Moda y cultura') }}</p>
          <h2 class="section-title reveal">{!! $intro?->get('title', 'Vestir ideas,<br>no tendencias') !!}</h2>
          <p class="section-text reveal">{!! $intro?->get('paragraph_1', 'La moda es un lenguaje: dice qui&eacute;nes somos antes incluso de que hablemos. En SANZAHRA abordamos la moda como una forma de cultura contempor&aacute;nea, m&aacute;s cerca del arte y la antropolog&iacute;a que del mero consumo.') !!}</p>
          <p class="section-text reveal">{!! $intro?->get('paragraph_2', 'Creamos marcas propias, producimos eventos de moda como experiencias narrativas y acompa&ntilde;amos a la nueva generaci&oacute;n de dise&ntilde;adores a trav&eacute;s de nuestro programa de captaci&oacute;n de talento.') !!}</p>
        </div>
        <div class="two-col-image reveal" style="background-image:url('{{ image_url($intro?->get('image'), 'assets/img/moda/moda-23-ilustraciones.jpg') }}')"></div>
      </div>
    </div>
  </section>

  @php $marcas = $page->blockByKey('marcas_propias'); $brands = $marcas?->get('brands', []); @endphp
  <section id="marcas-propias" class="bg-light" style="scroll-margin-top: 100px;">
    <div class="container">
      <p class="section-label reveal">{{ $marcas?->get('section_label', 'Marcas propias') }}</p>
      <h2 class="section-title reveal">{!! $marcas?->get('title', 'Construimos universos<br>de marca completos') !!}</h2>
      <p class="section-text reveal">{!! $marcas?->get('description', 'Creamos marcas de moda desde cero: concepto, identidad, dise&ntilde;o, producci&oacute;n y lanzamiento. Cada marca propia de SANZAHRA nace con una voz propia y una historia clara que contar.') !!}</p>
    </div>
    @if($brands)
      @foreach($brands as $brand)
        <div class="container reveal" style="margin-top:3rem;">
          <div class="coming-soon-card">
            <div class="cs-logo">{{ $brand['name'] ?? '' }}</div>
            <p class="cs-desc">{{ $brand['description'] ?? '' }}</p>
            @if($loop->first)
              <button type="button" class="cs-btn" data-open-florecilla>Visitar {{ $brand['name'] ?? '' }}</button>
            @else
              <span class="cs-badge">Pr&oacute;ximamente</span>
            @endif
          </div>
        </div>
      @endforeach
    @else
      <div class="container reveal" style="margin-top:3rem;">
        <div class="coming-soon-card">
          <div class="cs-logo">La Florecilla</div>
          <p class="cs-desc">Nuestra primera marca propia de moda. Un proyecto cuidadosamente construido desde el detalle, que muy pronto tendr&aacute; su propia historia que contar.</p>
          <button type="button" class="cs-btn" data-open-florecilla>Visitar La Florecilla</button>
        </div>
      </div>
    @endif
  </section>

  @php $firstBrand = $brands[0] ?? null; @endphp
  <div id="florecillaModal" class="fl-modal" role="dialog" aria-hidden="true">
    <button type="button" class="fl-close" aria-label="Cerrar" data-close-florecilla>&times;</button>
    <div class="fl-modal-inner">
      <div class="fl-modal-bg" style="background-image:url('{{ image_url($firstBrand['modal_image'] ?? null, 'assets/img/extra/extra-15-rosa.jpg') }}')"></div>
      <div class="fl-modal-content">
        <p class="fl-brand">{{ $firstBrand['name'] ?? 'La Florecilla' }}</p>
        <h2 class="fl-title">COMING<br>SOON</h2>
        <p class="fl-sub">Nuestra primera marca propia de moda.<br>Muy pronto podr&aacute;s descubrirla.</p>
      </div>
    </div>
  </div>

  @php $colab = $page->blockByKey('colaboraciones'); @endphp
  <section id="colaboraciones" style="scroll-margin-top: 100px;">
    <div class="container">
      <div class="two-col">
        <div class="reveal">
          <p class="section-label">{{ $colab?->get('section_label', 'Colaboraciones') }}</p>
          <h2 class="section-title">{!! $colab?->get('title', 'Dise&ntilde;adores,<br>firmas e instituciones') !!}</h2>
          <p class="section-text">{!! $colab?->get('paragraph_1', 'Colaboramos con marcas consolidadas, dise&ntilde;adores emergentes y proyectos culturales que comparten nuestra visi&oacute;n. Aportamos direcci&oacute;n creativa, producci&oacute;n y comunicaci&oacute;n a colecciones c&aacute;psula, capsulas editoriales, campa&ntilde;as compartidas y presentaciones conjuntas.') !!}</p>
          <p class="section-text">{!! $colab?->get('paragraph_2', 'Cada colaboraci&oacute;n se dise&ntilde;a como un proyecto &uacute;nico: desde el brief inicial hasta la pieza final, cuidando la coherencia est&eacute;tica y la narrativa que hay detr&aacute;s.') !!}</p>
        </div>
        <div class="two-col-image reveal" style="background-image:url('{{ image_url($colab?->get('image'), 'assets/img/moda/moda-36-joyeria-glitch2.jpg') }}')"></div>
      </div>
    </div>
  </section>

  @php $imgBreak = $page->blockByKey('image_break'); @endphp
  <div class="image-break" style="background-image:url('{{ image_url($imgBreak?->get('image'), 'assets/img/extra/extra-18-flores-escultura.jpg') }}')">
    <div class="image-break-text">
      <h3>{!! $imgBreak?->get('heading', 'La moda no viste: narra') !!}</h3>
      <p>{{ $imgBreak?->get('subheading', 'Cultura, cuerpo y contemporaneidad') }}</p>
    </div>
  </div>

  @php $talento = $page->blockByKey('talento_form'); @endphp
  <section id="talento" class="bg-light" style="scroll-margin-top: 100px;">
    <div class="container">
      <div class="two-col">
        <div class="two-col-image reveal" style="background-image:url('{{ image_url($talento?->get('image'), 'assets/img/moda/moda-37-anillos-guantes2.jpg') }}')"></div>
        <div class="reveal">
          <p class="section-label">{{ $talento?->get('section_label', 'Captaci&oacute;n de talento') }}</p>
          <h2 class="section-title">{!! $talento?->get('title', 'Buscamos la<br>pr&oacute;xima generaci&oacute;n') !!}</h2>
          <p class="section-text">{!! $talento?->get('description', '&iquest;Eres dise&ntilde;ador, modelo, estilista o creativo emergente? Estamos siempre atentos a nuevas voces. Env&iacute;anos tu portfolio o tu candidatura y nuestro equipo te contactar&aacute; si hay una oportunidad que encaje.') !!}</p>
          <form class="contact-form-simple reveal" onsubmit="event.preventDefault(); alert('Candidatura recibida. Gracias por tu interés.'); this.reset();" style="margin-top: 2rem;">
            <input type="text" name="nombre" placeholder="Nombre completo" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="tel" name="telefono" placeholder="Tel&eacute;fono" />
            <input type="text" name="perfil" placeholder="Tu perfil (dise&ntilde;ador, modelo, estilista...)" required />
            <input type="url" name="portfolio" placeholder="Link a tu portfolio o redes sociales" />
            <textarea name="mensaje" rows="4" placeholder="Cu&eacute;ntanos brevemente sobre ti" required></textarea>
            <button type="submit">Enviar candidatura</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  @php $identidad = $page->blockByKey('identidad_tags'); $identidadTags = $identidad?->get('tags', []); @endphp
  <section id="identidad" style="scroll-margin-top: 100px;">
    <div class="container">
      <div class="two-col reverse">
        <div class="reveal">
          <p class="section-label">{{ $identidad?->get('section_label', 'Identidad de marcas') }}</p>
          <h2 class="section-title">{!! $identidad?->get('title', 'Branding pensado<br>para la moda') !!}</h2>
          <p class="section-text">{!! $identidad?->get('paragraph_1', 'Trabajamos la identidad visual de firmas de moda, dise&ntilde;adores independientes y boutiques: naming, logotipos, paletas, tipograf&iacute;as, sistemas gr&aacute;ficos, packaging y presencia digital. Todo pensado para que la marca tenga la misma voz coherente desde la etiqueta hasta la campa&ntilde;a.') !!}</p>
          <p class="section-text">{!! $identidad?->get('paragraph_2', 'Cuando una identidad est&aacute; bien construida, se reconoce en el primer golpe de vista. Y eso cambia por completo c&oacute;mo el mercado percibe una marca de moda.') !!}</p>
          <div class="tag-list reveal">
            @if($identidadTags)
              @foreach($identidadTags as $tag)
                <span class="tag">{{ $tag }}</span>
              @endforeach
            @else
              <span class="tag">Naming</span>
              <span class="tag">Logo y s&iacute;mbolo</span>
              <span class="tag">Sistema visual</span>
              <span class="tag">Packaging</span>
              <span class="tag">Presencia digital</span>
              <span class="tag">Lookbooks</span>
            @endif
          </div>
        </div>
        <div class="two-col-image reveal" style="background-image:url('{{ image_url($identidad?->get('image'), 'assets/img/moda/moda-25-bocetos.jpg') }}')"></div>
      </div>
    </div>
  </section>

  @php $desfiles = $page->blockByKey('desfiles_cta'); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $desfiles?->get('section_label', 'Eventos y desfiles') }}</p>
      <h2 class="section-title reveal">{!! $desfiles?->get('title', 'Desfiles') !!}</h2>
      <p class="section-text reveal">{!! $desfiles?->get('description', 'Un programa propio de eventos de moda pensado para dar visibilidad a creadores emergentes y celebrar el talento nacional. Pasarelas, encuentros y experiencias inmersivas que unen moda, m&uacute;sica y arte contempor&aacute;neo.') !!}</p>
    </div>
    <div class="image-break reveal" style="background-image:url('{{ image_url($desfiles?->get('image_break'), 'assets/img/eventos/eventos-14-pasarela-flores.jpg') }}'); margin-top:3rem;">
      <div class="image-break-text">
        <h3>{!! $desfiles?->get('break_heading', 'Una pasarela hecha de flores') !!}</h3>
        <p>{!! $desfiles?->get('break_sub', 'Pr&oacute;ximo evento SANZAHRA') !!}</p>
      </div>
    </div>
    <div class="container reveal" style="margin-top:3rem;">
      <div class="coming-soon-card">
        <div class="cs-logo">Desfiles</div>
        <p class="cs-desc">El primer evento est&aacute; en preparaci&oacute;n. Muy pronto compartiremos programa, fechas y c&oacute;mo formar parte de esta nueva cita con la moda.</p>
        <span class="cs-badge">{!! $desfiles?->get('badge', 'Pr&oacute;ximamente') !!}</span>
      </div>
    </div>
  </section>

  @php $cta = $page->blockByKey('cta_final'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Hablemos') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', '&iquest;Tienes un proyecto<br>de moda en mente?') !!}</h2>
      <p>{{ $cta?->get('description', 'Creación de marca, desfile, evento o colaboración: cuéntanos tu idea y te proponemos el enfoque más adecuado.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Contactar') }}</a>
    </div>
  </section>

@endsection
