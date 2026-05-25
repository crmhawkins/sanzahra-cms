@extends('layouts.app')

@section('content')

  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($page->blockByKey('hero')?->get('image'), 'assets/img/moda/moda-24-editorial-bw.jpg') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">Moda</p>
      <h1>La moda<br>como forma de cultura</h1>
      <p class="subtitle">Creaci&oacute;n de marcas, producci&oacute;n de desfiles y gesti&oacute;n de talento. Vestir ideas antes que cuerpos.</p>
    </div>
  </section>

  <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Moda</nav>

  <section>
    <div class="container">
      <div class="two-col">
        <div>
          <p class="section-label reveal">Moda y cultura</p>
          <h2 class="section-title reveal">Vestir ideas,<br>no tendencias</h2>
          <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_1', 'La moda es un lenguaje: dice qui&eacute;nes somos antes incluso de que hablemos. En SANZAHRA abordamos la moda como una forma de cultura contempor&aacute;nea, m&aacute;s cerca del arte y la antropolog&iacute;a que del mero consumo.') !!}</p>
          <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_2', 'Creamos marcas propias, producimos eventos de moda como experiencias narrativas y acompa&ntilde;amos a la nueva generaci&oacute;n de dise&ntilde;adores a trav&eacute;s de nuestro programa de captaci&oacute;n de talento.') !!}</p>
        </div>
        <div class="two-col-image reveal" style="background-image:url('{{ image_url($page->blockByKey('intro')?->get('image'), 'assets/img/moda/moda-23-ilustraciones.jpg') }}')"></div>
      </div>
    </div>
  </section>

  <section id="marcas-propias" class="bg-light" style="scroll-margin-top: 100px;">
    <div class="container">
      <p class="section-label reveal">Marcas propias</p>
      <h2 class="section-title reveal">Construimos universos<br>de marca completos</h2>
      <p class="section-text reveal">Creamos marcas de moda desde cero: concepto, identidad, dise&ntilde;o, producci&oacute;n y lanzamiento. Cada marca propia de SANZAHRA nace con una voz propia y una historia clara que contar.</p>
    </div>
    <div class="container reveal" style="margin-top:3rem;">
      <div class="coming-soon-card">
        <div class="cs-logo">La Florecilla</div>
        <p class="cs-desc">Nuestra primera marca propia de moda. Un proyecto cuidadosamente construido desde el detalle, que muy pronto tendr&aacute; su propia historia que contar.</p>
        <button type="button" class="cs-btn" data-open-florecilla>Visitar La Florecilla</button>
      </div>
    </div>
  </section>

  <div id="florecillaModal" class="fl-modal" role="dialog" aria-hidden="true">
    <button type="button" class="fl-close" aria-label="Cerrar" data-close-florecilla>&times;</button>
    <div class="fl-modal-inner">
      <div class="fl-modal-bg" style="background-image:url('/assets/img/extra/extra-15-rosa.jpg')"></div>
      <div class="fl-modal-content">
        <p class="fl-brand">La Florecilla</p>
        <h2 class="fl-title">COMING<br>SOON</h2>
        <p class="fl-sub">Nuestra primera marca propia de moda.<br>Muy pronto podr&aacute;s descubrirla.</p>
      </div>
    </div>
  </div>

  <section id="colaboraciones" style="scroll-margin-top: 100px;">
    <div class="container">
      <div class="two-col">
        <div class="reveal">
          <p class="section-label">Colaboraciones</p>
          <h2 class="section-title">Dise&ntilde;adores,<br>firmas e instituciones</h2>
          <p class="section-text">Colaboramos con marcas consolidadas, dise&ntilde;adores emergentes y proyectos culturales que comparten nuestra visi&oacute;n. Aportamos direcci&oacute;n creativa, producci&oacute;n y comunicaci&oacute;n a colecciones c&aacute;psula, capsulas editoriales, campa&ntilde;as compartidas y presentaciones conjuntas.</p>
          <p class="section-text">Cada colaboraci&oacute;n se dise&ntilde;a como un proyecto &uacute;nico: desde el brief inicial hasta la pieza final, cuidando la coherencia est&eacute;tica y la narrativa que hay detr&aacute;s.</p>
        </div>
        <div class="two-col-image reveal" style="background-image:url('/assets/img/moda/moda-36-joyeria-glitch2.jpg')"></div>
      </div>
    </div>
  </section>

  <div class="image-break" style="background-image:url('/assets/img/extra/extra-18-flores-escultura.jpg')">
    <div class="image-break-text">
      <h3>La moda no viste: narra</h3>
      <p>Cultura, cuerpo y contemporaneidad</p>
    </div>
  </div>

  <section id="talento" class="bg-light" style="scroll-margin-top: 100px;">
    <div class="container">
      <div class="two-col">
        <div class="two-col-image reveal" style="background-image:url('/assets/img/moda/moda-37-anillos-guantes2.jpg')"></div>
        <div class="reveal">
          <p class="section-label">Captaci&oacute;n de talento</p>
          <h2 class="section-title">Buscamos la<br>pr&oacute;xima generaci&oacute;n</h2>
          <p class="section-text">&iquest;Eres dise&ntilde;ador, modelo, estilista o creativo emergente? Estamos siempre atentos a nuevas voces. Env&iacute;anos tu portfolio o tu candidatura y nuestro equipo te contactar&aacute; si hay una oportunidad que encaje.</p>
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

  <section id="identidad" style="scroll-margin-top: 100px;">
    <div class="container">
      <div class="two-col reverse">
        <div class="reveal">
          <p class="section-label">Identidad de marcas</p>
          <h2 class="section-title">Branding pensado<br>para la moda</h2>
          <p class="section-text">Trabajamos la identidad visual de firmas de moda, dise&ntilde;adores independientes y boutiques: naming, logotipos, paletas, tipograf&iacute;as, sistemas gr&aacute;ficos, packaging y presencia digital. Todo pensado para que la marca tenga la misma voz coherente desde la etiqueta hasta la campa&ntilde;a.</p>
          <p class="section-text">Cuando una identidad est&aacute; bien construida, se reconoce en el primer golpe de vista. Y eso cambia por completo c&oacute;mo el mercado percibe una marca de moda.</p>
          <div class="tag-list reveal">
            <span class="tag">Naming</span>
            <span class="tag">Logo y s&iacute;mbolo</span>
            <span class="tag">Sistema visual</span>
            <span class="tag">Packaging</span>
            <span class="tag">Presencia digital</span>
            <span class="tag">Lookbooks</span>
          </div>
        </div>
        <div class="two-col-image reveal" style="background-image:url('/assets/img/moda/moda-25-bocetos.jpg')"></div>
      </div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Eventos y desfiles</p>
      <h2 class="section-title reveal">Desfiles</h2>
      <p class="section-text reveal">Un programa propio de eventos de moda pensado para dar visibilidad a creadores emergentes y celebrar el talento nacional. Pasarelas, encuentros y experiencias inmersivas que unen moda, m&uacute;sica y arte contempor&aacute;neo.</p>
    </div>
    <div class="image-break reveal" style="background-image:url('/assets/img/eventos/eventos-14-pasarela-flores.jpg'); margin-top:3rem;">
      <div class="image-break-text">
        <h3>Una pasarela hecha de flores</h3>
        <p>Pr&oacute;ximo evento SANZAHRA</p>
      </div>
    </div>
    <div class="container reveal" style="margin-top:3rem;">
      <div class="coming-soon-card">
        <div class="cs-logo">Desfiles</div>
        <p class="cs-desc">El primer evento est&aacute; en preparaci&oacute;n. Muy pronto compartiremos programa, fechas y c&oacute;mo formar parte de esta nueva cita con la moda.</p>
        <span class="cs-badge">Pr&oacute;ximamente</span>
      </div>
    </div>
  </section>

  <section>
    <div class="cta-block">
      <p class="section-label">Hablemos</p>
      <h2 class="section-title">&iquest;Tienes un proyecto<br>de moda en mente?</h2>
      <p>Creaci&oacute;n de marca, desfile, evento o colaboraci&oacute;n: cu&eacute;ntanos tu idea y te proponemos el enfoque m&aacute;s adecuado.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Contactar</a>
    </div>
  </section>

@endsection
