@extends('layouts.app')

@section('content')

  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=80')"></div>
    <div class="page-hero-content">
      <p class="kicker">Asistencia Ejecutiva</p>
      <h1>El lujo<br>del tiempo</h1>
      <p class="subtitle">Servicio concierge integral para empresas y ejecutivos de alto nivel. Nos ocupamos de todo lo que no tiene tiempo.</p>
    </div>
  </section>

  <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> <a href="{{ route('page', 'servicios') }}">Servicios</a> <span>/</span> Asistencia Ejecutiva</nav>

  <section>
    <div class="two-col">
      <div>
        <p class="section-label reveal">Disciplina</p>
        <h2 class="section-title reveal">Discreci&oacute;n absoluta,<br>eficacia total</h2>
        <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_1', 'Tu tiempo es el activo m&aacute;s valioso que posees. Nuestro servicio de asistencia ejecutiva se dise&ntilde;a para devolvert&eacute;lo. Gestionamos agendas, viajes, reservas, imprevistos, b&uacute;squeda de recursos especializados y coordinaci&oacute;n de equipos con la m&aacute;xima profesionalidad.') !!}</p>
        <p class="section-text reveal">{!! $page->blockByKey('intro')?->get('paragraph_2', 'Trabajamos con empresas y perfiles ejecutivos que exigen excelencia, rapidez y discreci&oacute;n absoluta. Un servicio silencioso, siempre disponible, que anticipa antes de que t&uacute; pidas.') !!}</p>
        <div class="tag-list reveal">
          <span class="tag">Concierge</span>
          <span class="tag">Agenda</span>
          <span class="tag">Viajes</span>
          <span class="tag">Discreci&oacute;n</span>
        </div>
      </div>
      <div class="two-col-image reveal" style="background-image:url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80')"></div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Qu&eacute; incluye</p>
      <h2 class="section-title reveal">&Aacute;reas<br>de trabajo</h2>
    </div>
    <div class="features reveal">
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
    </div>
  </section>

  <div class="image-break" style="background-image:url('https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=1920&q=80')">
    <div class="image-break-text">
      <h3>&laquo;El verdadero lujo<br>es tener tiempo&raquo;</h3>
      <p>Nos ocupamos de los detalles para que t&uacute; te ocupes de lo esencial</p>
    </div>
  </div>

  <section>
    <div class="container">
      <p class="section-label reveal">Nuestro proceso</p>
      <h2 class="section-title reveal">C&oacute;mo trabajamos</h2>
    </div>
    <div class="process-grid reveal">
      <div class="process-step"><div class="step-num">01</div><h4>Alta del servicio</h4><p>Formalizamos el acuerdo con absoluta confidencialidad y establecemos los canales de comunicaci&oacute;n seguros.</p></div>
      <div class="process-step"><div class="step-num">02</div><h4>Definici&oacute;n de necesidades</h4><p>Entrevista inicial para entender tu d&iacute;a a d&iacute;a, tus preferencias, tus est&aacute;ndares y los puntos cr&iacute;ticos a cubrir.</p></div>
      <div class="process-step"><div class="step-num">03</div><h4>Asignaci&oacute;n de asistente</h4><p>Designamos un profesional dedicado, con perfil y experiencia alineados con tu sector y tus exigencias.</p></div>
      <div class="process-step"><div class="step-num">04</div><h4>Seguimiento continuo</h4><p>Revisi&oacute;n peri&oacute;dica del servicio, ajustes y mejoras. Nos adaptamos a la evoluci&oacute;n de tus necesidades.</p></div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Visual</p>
      <h2 class="section-title reveal">Inspiraci&oacute;n</h2>
    </div>
    <div class="gallery reveal">
      <div class="gallery-item" style="background-image:url('/assets/img/branding/branding-04.jpg')"></div>
      <div class="gallery-item" style="background-image:url('/assets/img/moda/moda-40-vestido-ondas-blanco.jpg')"></div>
      <div class="gallery-item" style="background-image:url('/assets/img/extra/extra-11.jpg')"></div>
    </div>
  </section>

  <section>
    <div class="cta-block">
      <p class="section-label">Empecemos</p>
      <h2 class="section-title">Recupera<br>tu tiempo</h2>
      <p>Agenda una conversaci&oacute;n confidencial. Te explicaremos c&oacute;mo podemos integrarnos en tu d&iacute;a a d&iacute;a desde el primer momento.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Contactar</a>
    </div>
  </section>

@endsection
