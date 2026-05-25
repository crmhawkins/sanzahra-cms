@extends('layouts.app')

@section('content')

  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ image_url($page->blockByKey('hero')?->get('image'), null) ?? 'https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=1920&q=80' }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">Interiorismo</p>
      <h1>Los espacios<br>hablan de nosotros</h1>
      <p class="subtitle">Proyectos residenciales de alta gama, hoteler&iacute;a boutique y 5 estrellas, y producci&oacute;n de stands con alma.</p>
    </div>
  </section>

  <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Interiorismo</nav>

  <section>
    <div class="container">
      <div class="two-col">
        <div>
          <p class="section-label reveal">Dise&ntilde;o de espacios</p>
          <h2 class="section-title reveal">El espacio<br>como retrato</h2>
          <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_1', 'Un espacio bien dise&ntilde;ado no se impone: se habita. Cuenta qui&eacute;n vive, qui&eacute;n recibe, qui&eacute;n trabaja dentro de &eacute;l. En SANZAHRA concebimos el interiorismo como un ejercicio de escucha: entender la vida que suceder&aacute; entre esas paredes antes de proponer un solo material.') !!}</p>
          <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_2', 'Desde residencias privadas de alta gama hasta hoteles boutique y cinco estrellas, pasando por producci&oacute;n y construcci&oacute;n de stands, cada proyecto se aborda con rigor t&eacute;cnico y sensibilidad est&eacute;tica.') !!}</p>
          <div class="tag-list reveal">
            <span class="tag">Residencial</span>
            <span class="tag">Hoteler&iacute;a boutique</span>
            <span class="tag">Hoteler&iacute;a 5 estrellas</span>
            <span class="tag">Stand Builder</span>
            <span class="tag">Event Producer</span>
            <span class="tag">Retail</span>
          </div>
        </div>
        <div class="two-col-image reveal" style="background-image:url('https://images.unsplash.com/photo-1600585154526-990dced4db0d?w=800&q=80')"></div>
      </div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Qu&eacute; incluye</p>
      <h2 class="section-title reveal">Tres &aacute;mbitos,<br>una misma exigencia</h2>
    </div>
    <div class="features reveal">
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
    </div>
  </section>

  <div class="image-break" style="background-image:url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&q=80')">
    <div class="image-break-text">
      <h3>Los espacios no se decoran: se escriben</h3>
      <p>Con luz, con materia, con tiempo</p>
    </div>
  </div>

  <section>
    <div class="container">
      <p class="section-label reveal">Nuestro proceso</p>
      <h2 class="section-title reveal">Del plano<br>a la key del proyecto</h2>
    </div>
    <div class="process-grid reveal">
      <div class="process-step"><div class="step-num">01</div><h4>An&aacute;lisis del espacio</h4><p>Estudio del lugar, la luz, la circulaci&oacute;n y el contexto. Escuchamos al cliente y al edificio.</p></div>
      <div class="process-step"><div class="step-num">02</div><h4>Concepto y mood</h4><p>Definimos la atm&oacute;sfera, la paleta de materiales y el relato est&eacute;tico que guiar&aacute; cada decisi&oacute;n.</p></div>
      <div class="process-step"><div class="step-num">03</div><h4>Desarrollo t&eacute;cnico</h4><p>Planos de detalle, mobiliario a medida, iluminaci&oacute;n y especificaciones constructivas listos para obra.</p></div>
      <div class="process-step"><div class="step-num">04</div><h4>Ejecuci&oacute;n y key</h4><p>Direcci&oacute;n de obra, supervisi&oacute;n de proveedores y entrega llave en mano del proyecto terminado.</p></div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Proyectos seleccionados</p>
      <h2 class="section-title reveal">Interiores<br>recientes</h2>
    </div>
    <div class="gallery reveal">
      <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1600210492493-0946911123ea?w=600&q=80')"></div>
      <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1615873968403-89e068629265?w=600&q=80')"></div>
      <div class="gallery-item" style="background-image:url('https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&q=80')"></div>
    </div>
  </section>

  <section>
    <div class="cta-block">
      <p class="section-label">Empecemos</p>
      <h2 class="section-title">Dise&ntilde;emos<br>tu espacio</h2>
      <p>Solicita una consulta inicial gratuita. Visitamos el lugar, escuchamos tu visi&oacute;n y te proponemos un enfoque a medida.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Contactar</a>
    </div>
  </section>

@endsection
