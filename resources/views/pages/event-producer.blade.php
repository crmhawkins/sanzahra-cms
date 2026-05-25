@extends('layouts.app')

@section('content')

  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($page->blockByKey('hero')?->get('image'), 'assets/img/eventos/eventos-13-pasarela-flores.jpg') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">Producci&oacute;n de Eventos</p>
      <h1>Pasarela<br>de Moda</h1>
      <p class="subtitle">Producci&oacute;n integral de pasarelas, desfiles y eventos de moda. Del casting a la &uacute;ltima luz, del croquis al aplauso final.</p>
    </div>
  </section>

  <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Producci&oacute;n de Eventos</nav>

  <section>
    <div class="two-col">
      <div>
        <p class="section-label reveal">Disciplina</p>
        <h2 class="section-title reveal">Experiencias<br>que se recuerdan</h2>
        <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_1', 'Un desfile no es solo el paseo de una colecci&oacute;n: es el momento en el que una marca dice qui&eacute;n es. En SANZAHRA producimos pasarelas, presentaciones y eventos de moda concebidos como experiencias narrativas completas, donde cada modelo, cada luz y cada segundo cuenta la misma historia.') !!}</p>
        <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_2', 'Nos especializamos exclusivamente en el universo de la moda: pasarelas, desfiles, editoriales en vivo, presentaciones de colecci&oacute;n y lanzamientos de marca. Coordinamos direcci&oacute;n creativa, casting, escenograf&iacute;a, t&eacute;cnica, m&uacute;sica y comunicaci&oacute;n bajo una sola mirada.') !!}</p>
        <div class="tag-list reveal">
          <span class="tag">Pasarelas</span>
          <span class="tag">Desfiles</span>
          <span class="tag">Presentaciones de colecci&oacute;n</span>
          <span class="tag">Lanzamientos de marca</span>
          <span class="tag">Editoriales en vivo</span>
        </div>
      </div>
      <div class="two-col-image reveal" style="background-image:url('/assets/img/moda/moda-24-editorial-bw.jpg')"></div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Qu&eacute; hacemos</p>
      <h2 class="section-title reveal">Del croquis<br>al aplauso final</h2>
    </div>
    <div class="features reveal">
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
    </div>
  </section>

  <div class="image-break" style="background-image:url('/assets/img/eventos/eventos-14-pasarela-flores.jpg')">
    <div class="image-break-text">
      <h3>&laquo;Una pasarela no se improvisa:<br>se dirige&raquo;</h3>
      <p>Cada paso es una decisi&oacute;n creativa</p>
    </div>
  </div>

  <section>
    <div class="container">
      <p class="section-label reveal">Nuestro proceso</p>
      <h2 class="section-title reveal">C&oacute;mo trabajamos</h2>
    </div>
    <div class="process-grid reveal">
      <div class="process-step"><div class="step-num">01</div><h4>Concepto</h4><p>Direcci&oacute;n creativa, narrativa del desfile, mood y universo visual que dar&aacute; forma a la experiencia.</p></div>
      <div class="process-step"><div class="step-num">02</div><h4>Casting y coreograf&iacute;a</h4><p>Selecci&oacute;n de modelos, prueba de estilismo, orden de salida y coreograf&iacute;a espec&iacute;fica para cada look.</p></div>
      <div class="process-step"><div class="step-num">03</div><h4>Escenograf&iacute;a y t&eacute;cnica</h4><p>Dise&ntilde;o de pasarela, iluminaci&oacute;n, m&uacute;sica, sonido y backstage. Todo lo que se ve y lo que no.</p></div>
      <div class="process-step"><div class="step-num">04</div><h4>Show time</h4><p>Direcci&oacute;n el d&iacute;a del desfile: control absoluto desde backstage. De la primera salida al saludo final.</p></div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Visual</p>
      <h2 class="section-title reveal">Inspiraci&oacute;n</h2>
    </div>
    <div class="gallery reveal">
      <div class="gallery-item" style="background-image:url('/assets/img/eventos/eventos-16-vestido-blanco-pasarela.jpg')"></div>
      <div class="gallery-item" style="background-image:url('/assets/img/eventos/eventos-15-pasarela-flores2.jpg')"></div>
      <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-29-editorial-blur.jpg')"></div>
    </div>
  </section>

  <section>
    <div class="cta-block">
      <p class="section-label">Empecemos</p>
      <h2 class="section-title">&iquest;Tienes una pasarela<br>o desfile en mente?</h2>
      <p>Cu&eacute;ntanos tu colecci&oacute;n, la fecha y tu visi&oacute;n. Te propondremos un concepto a medida.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Contactar</a>
    </div>
  </section>

@endsection
