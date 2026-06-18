@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero'); @endphp
  <section class="page-hero">
    <div class="hero-bg" style="background-image:url('{{ $hero?->get('background_image') ? image_url($hero->get('background_image')) : 'https://images.unsplash.com/photo-1539037116277-4db20889f2d4?w=1920&q=80' }}')"></div>
    <div class="page-hero-content">
      <p class="kicker">{{ $hero?->get('kicker', 'Contacto') }}</p>
      <h1>{!! $hero?->get('title', 'Hablemos de tu<br>pr&oacute;ximo proyecto') !!}</h1>
      <p class="subtitle">{{ $hero?->get('subtitle', 'Cada gran proyecto empieza con una conversación sincera. Cuéntanos tu idea y exploremos cómo darle forma juntos.') }}</p>
    </div>
  </section>

  @php $breadcrumbItems = $page->blockByKey('breadcrumb')?->get('items', []); @endphp
  @if($breadcrumbItems)
    <nav class="breadcrumb">
      @foreach($breadcrumbItems as $i => $crumb)
        @if(!empty($crumb['url']))<a href="{{ nav_url($crumb['url']) }}">{{ $crumb['label'] ?? '' }}</a>@else{{ $crumb['label'] ?? '' }}@endif
        @if($i < count($breadcrumbItems) - 1) <span>/</span> @endif
      @endforeach
    </nav>
  @else
    <nav class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> <span>/</span> Contacto</nav>
  @endif

  @php
    $contact = $page->blockByKey('contact_duo');
    $contactEmail = $contact?->get('email', 'info@sanzahra.com');
    $contactTel   = $contact?->get('tel', '+34 646 63 95 58');
  @endphp
  <section>
    <div class="contact-duo">
      <div class="contact-duo-image reveal" style="background-image:url('{{ image_url($contact?->get('image'), 'assets/img/extra/extra-17-contacto.jpg') }}')"></div>
      <div class="contact-duo-form reveal">
        <p class="section-label">{{ $contact?->get('section_label', 'Escríbenos') }}</p>
        <h2 class="section-title">{!! $contact?->get('title', 'Cu&eacute;ntanos<br>tu proyecto') !!}</h2>
        <p class="contact-duo-lead">{{ $contact?->get('lead', 'Respondemos en menos de 24 horas laborables con una propuesta personalizada.') }}</p>
        <form class="contact-form-simple" onsubmit="event.preventDefault(); alert('Mensaje enviado. Gracias por tu interés.'); this.reset();">
          <input type="text" name="nombre" placeholder="Nombre" required />
          <input type="email" name="email" placeholder="Email" required />
          <input type="tel" name="telefono" placeholder="Tel&eacute;fono" />
          <input type="text" name="asunto" placeholder="Asunto" />
          <textarea name="mensaje" rows="4" placeholder="Mensaje" required></textarea>
          <button type="submit">Enviar</button>
        </form>
        <div class="contact-simple-info">
          <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>
          <a href="tel:{{ preg_replace('/\s+/', '', $contactTel) }}">{{ $contactTel }}</a>
          <span>{{ $contact?->get('direccion', 'Calle Córdoba 6, Málaga') }}</span>
        </div>
      </div>
    </div>
  </section>

@endsection
