@extends('layouts.app')

@section('content')

  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1920&q=80')"></div>
    <div class="page-hero-content">
      <p class="kicker">Nuestros Servicios</p>
      <h1>Soluciones creativas<br>a medida</h1>
      <p class="subtitle">Seis disciplinas integradas bajo una misma visi&oacute;n. Trabajamos solos o en conjunto, seg&uacute;n el proyecto lo requiera.</p>
    </div>
  </section>

  <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> Servicios</nav>

  <section>
    <div class="container">
      <p class="section-label reveal">Visi&oacute;n integral</p>
      <h2 class="section-title reveal">Todo lo que tu marca<br>necesita, en un solo lugar</h2>
      <p class="section-text reveal">SANZAHRA integra seis disciplinas que habitualmente requerir&iacute;an distintos proveedores. Esto garantiza coherencia creativa, ahorro de tiempo y una &uacute;nica interlocuci&oacute;n para todo tu proyecto.</p>
    </div>

    <div class="container">
      <div class="service-row reveal">
        <div class="service-row-image" style="background-image:url('/assets/img/extra/extra-05.jpg')"></div>
        <div class="service-row-content">
          <span class="big-num">01</span>
          <h3>Moda</h3>
          <p>Creaci&oacute;n de marcas propias, colaboraciones con dise&ntilde;adores, captaci&oacute;n de talento y construcci&oacute;n de identidad para firmas de moda. La moda como forma de cultura contempor&aacute;nea.</p>
          <ul>
            <li>Marcas propias y colaboraciones</li>
            <li>Producci&oacute;n de pasarelas y editoriales</li>
            <li>Captaci&oacute;n de talento emergente</li>
            <li>Identidad visual para firmas de moda</li>
          </ul>
          <a href="{{ route('page', 'moda') }}" class="btn btn-dark">Ver m&aacute;s</a>
        </div>
      </div>

      <div class="service-row reverse reveal">
        <div class="service-row-image" style="background-image:url('/assets/img/branding/branding-02.jpg')"></div>
        <div class="service-row-content">
          <span class="big-num">02</span>
          <h3>Branding &amp; Marketing</h3>
          <p>Construimos marcas con alma: desde la estrategia y el naming hasta el sistema visual completo, el tono de voz y la narrativa que las sostiene en el tiempo.</p>
          <ul>
            <li>Estrategia de marca y posicionamiento</li>
            <li>Naming, identidad visual y manual</li>
            <li>Direcci&oacute;n de arte y campa&ntilde;as</li>
            <li>Contenido y redes sociales</li>
          </ul>
          <a href="{{ route('page', 'branding') }}" class="btn btn-dark">Ver m&aacute;s</a>
        </div>
      </div>

      <div class="service-row reveal">
        <div class="service-row-image" style="background-image:url('/assets/img/eventos/eventos-13-pasarela-flores.jpg')"></div>
        <div class="service-row-content">
          <span class="big-num">03</span>
          <h3>Producci&oacute;n de Eventos</h3>
          <p>Producci&oacute;n integral de pasarelas, desfiles y eventos de moda. Del casting a la &uacute;ltima luz: direcci&oacute;n creativa, escenograf&iacute;a, t&eacute;cnica y show.</p>
          <ul>
            <li>Pasarelas y desfiles de moda</li>
            <li>Presentaciones de colecci&oacute;n</li>
            <li>Lanzamientos de marca de moda</li>
            <li>Editoriales en vivo</li>
          </ul>
          <a href="{{ route('page', 'event-producer') }}" class="btn btn-dark">Ver m&aacute;s</a>
        </div>
      </div>

      <div class="service-row reverse reveal">
        <div class="service-row-image" style="background-image:url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&q=80')"></div>
        <div class="service-row-content">
          <span class="big-num">04</span>
          <h3>Interiorismo</h3>
          <p>Espacios que cuentan historias. Trabajamos residencias privadas de alta gama, hoteler&iacute;a 5 estrellas y locales comerciales donde cada material y cada luz est&aacute; elegido con intenci&oacute;n.</p>
          <ul>
            <li>Residencial de lujo</li>
            <li>Hoteler&iacute;a y restauraci&oacute;n</li>
            <li>Retail y showrooms</li>
            <li>Espacios ef&iacute;meros y pop-up</li>
          </ul>
          <a href="{{ route('page', 'interiorismo') }}" class="btn btn-dark">Ver m&aacute;s</a>
        </div>
      </div>

      <div class="service-row reveal">
        <div class="service-row-image" style="background-image:url('/assets/img/branding/branding-04.jpg')"></div>
        <div class="service-row-content">
          <span class="big-num">05</span>
          <h3>Asistencia Ejecutiva</h3>
          <p>Concierge ejecutivo de alto nivel para directivos, familias y patrimonio privado. Discreci&oacute;n absoluta, disponibilidad total y anticipaci&oacute;n a cada necesidad.</p>
          <ul>
            <li>Gesti&oacute;n de agenda y viajes</li>
            <li>Coordinaci&oacute;n de equipos personales</li>
            <li>Gesti&oacute;n de patrimonio y propiedades</li>
            <li>Lifestyle management</li>
          </ul>
          <a href="{{ route('page', 'asistencia-ejecutiva') }}" class="btn btn-dark">Ver m&aacute;s</a>
        </div>
      </div>

      <div class="service-row reverse reveal">
        <div class="service-row-image" style="background-image:url('https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=900&q=80')"></div>
        <div class="service-row-content">
          <span class="big-num">06</span>
          <h3>Arquitectura</h3>
          <p>Proyectos arquitect&oacute;nicos donde forma y funci&oacute;n se equilibran con precisi&oacute;n. Desarrollados en colaboraci&oacute;n con <a href="https://sumnomatec.com" target="_blank" rel="noopener" style="color:inherit; border-bottom:1px solid currentColor;">Sumnomatec</a>, nuestro partner de arquitectura.</p>
          <ul>
            <li>Sedes corporativas y oficinas</li>
            <li>Viviendas unifamiliares</li>
            <li>Pabellones y arquitectura ef&iacute;mera</li>
            <li>Rehabilitaci&oacute;n y patrimonio</li>
          </ul>
          <a href="{{ route('page', 'arquitectura') }}" class="btn btn-dark">Ver m&aacute;s</a>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Por qu&eacute; SANZAHRA</p>
      <h2 class="section-title reveal">Ventajas de trabajar<br>con nosotros</h2>
    </div>
    <div class="features reveal">
      <div class="feature">
        <h4>Un solo interlocutor</h4>
        <p>Olv&iacute;date de coordinar entre agencias. Te acompa&ntilde;amos en todas las fases con un &uacute;nico project manager.</p>
      </div>
      <div class="feature">
        <h4>Coherencia visual</h4>
        <p>Al crear bajo el mismo techo, garantizamos una est&eacute;tica unificada en todos los puntos de contacto de tu marca.</p>
      </div>
      <div class="feature">
        <h4>Agilidad real</h4>
        <p>Los plazos se acortan cuando los equipos trabajan en la misma sala. Tomamos decisiones en horas, no en semanas.</p>
      </div>
    </div>
  </section>

  <section>
    <div class="cta-block">
      <p class="section-label">Empecemos</p>
      <h2 class="section-title">Cu&eacute;ntanos<br>tu proyecto</h2>
      <p>Solicita una consulta inicial gratuita. Estudiamos tu caso y te proponemos el enfoque m&aacute;s adecuado.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Contactar</a>
    </div>
  </section>

@endsection
