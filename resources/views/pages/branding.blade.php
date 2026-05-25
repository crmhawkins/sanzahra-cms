@extends('layouts.app')

@section('content')

  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($page->blockByKey('hero')?->get('image'), 'assets/img/branding/branding-05.jpg') }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">Branding &amp; Marketing</p>
      <h1>La marca<br>como arquitectura</h1>
      <p class="subtitle">Construimos identidades que perduran. Estrategia, s&iacute;mbolo y narrativa al servicio de una visi&oacute;n.</p>
    </div>
  </section>

  <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Branding</nav>

  <section>
    <div class="container">
      <div class="two-col">
        <div>
          <p class="section-label reveal">Identidad y estrategia</p>
          <h2 class="section-title reveal">Marcas que se<br>recuerdan</h2>
          <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_1', 'Una marca no es un logotipo: es una arquitectura. Es la suma de decisiones, s&iacute;mbolos y silencios que configuran la manera en que el mundo te percibe. En SANZAHRA dise&ntilde;amos esa arquitectura desde el fundamento, con la paciencia de quien sabe que lo duradero no se improvisa.') !!}</p>
          <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_2', 'Trabajamos desde el concepto estrat&eacute;gico hasta la ejecuci&oacute;n visual, atendiendo cada punto de contacto con el mismo nivel de cuidado. El resultado son marcas coherentes, memorables y profundamente humanas.') !!}</p>
          <div class="tag-list reveal">
            <span class="tag">Identidad Visual</span>
            <span class="tag">Estrategia de Marca</span>
            <span class="tag">Naming</span>
            <span class="tag">Manual de marca</span>
            <span class="tag">Comunicaci&oacute;n digital</span>
            <span class="tag">Contenido editorial</span>
            <span class="tag">Publicidad</span>
          </div>
        </div>
        <div class="two-col-image reveal" style="background-image:url('/assets/img/branding/branding-08.jpg')"></div>
      </div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Qu&eacute; incluye</p>
      <h2 class="section-title reveal">Un sistema<br>completo de marca</h2>
    </div>
    <div class="features reveal">
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
    </div>
  </section>

  <div class="image-break" style="background-image:url('/assets/img/extra/extra-16.jpg')">
    <div class="image-break-text">
      <h3>Una marca no se dise&ntilde;a: se construye</h3>
      <p>Con tiempo, con criterio y con visi&oacute;n</p>
    </div>
  </div>

  <section>
    <div class="container">
      <p class="section-label reveal">Nuestro proceso</p>
      <h2 class="section-title reveal">De la intuici&oacute;n<br>al sistema</h2>
    </div>
    <div class="process-grid reveal">
      <div class="process-step"><div class="step-num">01</div><h4>Discovery</h4><p>Escuchamos, investigamos y entendemos el contexto, la historia y las aspiraciones de la marca.</p></div>
      <div class="process-step"><div class="step-num">02</div><h4>Estrategia</h4><p>Definimos el posicionamiento, el territorio conceptual y los pilares narrativos que sostendr&aacute;n la identidad.</p></div>
      <div class="process-step"><div class="step-num">03</div><h4>Dise&ntilde;o</h4><p>Traducimos la estrategia en un sistema visual y verbal: logotipo, tipograf&iacute;a, color, voz y c&oacute;digos propios.</p></div>
      <div class="process-step"><div class="step-num">04</div><h4>Implementaci&oacute;n</h4><p>Desplegamos la marca en todos los puntos de contacto y entregamos las herramientas para su uso coherente.</p></div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Trabajos seleccionados</p>
      <h2 class="section-title reveal">Identidades<br>recientes</h2>
    </div>
    <div class="gallery reveal">
      <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-39-modelo-flores-rojas.jpg')"></div>
      <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-34-ilustraciones-rosa.jpg')"></div>
      <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-25-bocetos.jpg')"></div>
    </div>
  </section>

  <section class="partner-section">
    <div class="container reveal">
      <div class="partner-card">
        <p class="section-label" style="color: rgba(255,255,255,.5);">Partner estrat&eacute;gico</p>
        <h2 class="section-title" style="color: var(--white);">En colaboraci&oacute;n con<br>Hawkins</h2>
        <p class="partner-desc">Nuestra divisi&oacute;n de branding y marketing se desarrolla en colaboraci&oacute;n con <strong>Hawkins</strong>, agencia de referencia en estrategia de marca, marketing digital y comunicaci&oacute;n. Una alianza que une la visi&oacute;n creativa de SANZAHRA con la experiencia de una agencia consolidada en el sector.</p>
        <a href="https://hawkins.es" target="_blank" rel="noopener" class="btn btn-light">Visitar hawkins.es &rarr;</a>
      </div>
    </div>
  </section>

  <section>
    <div class="cta-block">
      <p class="section-label">Empecemos</p>
      <h2 class="section-title">Construyamos<br>tu marca</h2>
      <p>Solicita una consulta inicial gratuita. Estudiamos tu caso y te proponemos el enfoque m&aacute;s adecuado para tu proyecto de marca.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Contactar</a>
    </div>
  </section>

@endsection
