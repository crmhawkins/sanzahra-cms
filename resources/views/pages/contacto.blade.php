@extends('layouts.app')

@section('content')

  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1539037116277-4db20889f2d4?w=1920&q=80')"></div>
    <div class="page-hero-content">
      <p class="kicker">Contacto</p>
      <h1>Hablemos de tu<br>pr&oacute;ximo proyecto</h1>
      <p class="subtitle">Cada gran proyecto empieza con una conversaci&oacute;n sincera. Cu&eacute;ntanos tu idea y exploremos c&oacute;mo darle forma juntos.</p>
    </div>
  </section>

  <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> Contacto</nav>

  @php use App\Models\Setting; @endphp
  <section>
    <div class="contact-duo">
      <div class="contact-duo-image reveal" style="background-image:url('{{ image_url($page->blockByKey('contact')?->get('image'), 'assets/img/extra/extra-17-contacto.jpg') }}')"></div>
      <div class="contact-duo-form reveal">
        <p class="section-label">Escr&iacute;benos</p>
        <h2 class="section-title">Cu&eacute;ntanos<br>tu proyecto</h2>
        <p class="contact-duo-lead">Respondemos en menos de 24 horas laborables con una propuesta personalizada.</p>
        <form class="contact-form-simple" onsubmit="event.preventDefault(); alert('Mensaje enviado. Gracias por tu interés.'); this.reset();">
          <input type="text" name="nombre" placeholder="Nombre" required />
          <input type="email" name="email" placeholder="Email" required />
          <input type="tel" name="telefono" placeholder="Tel&eacute;fono" />
          <input type="text" name="asunto" placeholder="Asunto" />
          <textarea name="mensaje" rows="4" placeholder="Mensaje" required></textarea>
          <button type="submit">Enviar</button>
        </form>
        <div class="contact-simple-info">
          <a href="mailto:{{ Setting::get('contacto_email', 'info@sanzahra.com') }}">{{ Setting::get('contacto_email', 'info@sanzahra.com') }}</a>
          <a href="tel:{{ preg_replace('/\s+/', '', Setting::get('contacto_telefono', '+34 646 63 95 58')) }}">{{ Setting::get('contacto_telefono', '+34 646 63 95 58') }}</a>
          <span>{{ Setting::get('contacto_direccion', 'Calle Córdoba 6, Málaga') }}</span>
        </div>
      </div>
    </div>
  </section>

@endsection
