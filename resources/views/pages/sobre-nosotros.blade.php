@extends('layouts.app')

@section('content')

  <section class="page-hero about-hero">
    <div class="about-hero-bg"></div>
    <div class="page-hero-content">
      <p class="kicker">Sobre Nosotros</p>
      <div class="about-brand">SANZAHRA</div>
      <p class="subtitle">Una visi&oacute;n, m&uacute;ltiples disciplinas. Creamos donde la est&eacute;tica se encuentra con la estrategia.</p>
    </div>
  </section>

  <section>
    <p class="pull-quote reveal">{!! $page->blockByKey('pull_quote')?->get('text', 'Creemos que el verdadero lujo no grita: susurra. Vive en el detalle que pocos ven y todos sienten, en la coherencia silenciosa entre forma, espacio y prop&oacute;sito.') !!}</p>
  </section>

  <div class="full-image reveal" style="background-image:url('{{ image_url($page->blockByKey('full_image')?->get('image'), 'assets/img/extra/extra-02.jpg') }}')"></div>

  <section>
    <div class="two-col">
      <div class="reveal">
        <p class="section-label">Filosof&iacute;a</p>
        <h2 class="section-title">La precisi&oacute;n es nuestra<br>forma de arte</h2>
        <p class="section-text">
          {!! $page->blockByKey('filosofia')?->get('paragraph_1', 'Creemos que cada proyecto merece la misma dedicaci&oacute;n sin importar su escala. Desde la concepci&oacute;n de una marca hasta la producci&oacute;n de una pasarela, aplicamos el mismo rigor est&eacute;tico y estrat&eacute;gico.') !!}
        </p>
        <p class="section-text">
          {!! $page->blockByKey('filosofia')?->get('paragraph_2', 'Nuestra multidisciplinariedad no es casualidad: es el resultado de entender que el lujo contempor&aacute;neo exige visiones integrales. Una marca de moda necesita algo m&aacute;s que una colecci&oacute;n, un evento algo m&aacute;s que producci&oacute;n, una identidad algo m&aacute;s que un logo.') !!}
        </p>
      </div>
      <div class="two-col-image reveal" style="background-image:url('{{ image_url($page->blockByKey('filosofia')?->get('image'), 'assets/img/moda/moda-34-ilustraciones-rosa.jpg') }}')"></div>
    </div>
  </section>

  <section class="bg-light">
    <div class="stat-block reveal">
      <div class="stat-num">{{ $page->blockByKey('stat')?->get('number', '+50') }}</div>
      <div class="stat-text">
        <h3>{!! $page->blockByKey('stat')?->get('title', 'proyectos de experiencia<br>de nuestro equipo') !!}</h3>
        <p>{{ $page->blockByKey('stat')?->get('description', 'Marcas de moda propias y ajenas, pasarelas y desfiles, identidades corporativas, colaboraciones editoriales y producciones internacionales. Cada cifra es, en realidad, una historia hecha a medida.') }}</p>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <p class="section-label reveal">Nuestra historia</p>
      <h2 class="section-title reveal">Hitos del camino</h2>
    </div>
    <div class="timeline reveal">
      @php $timeline = $page->blockByKey('timeline')?->get('items', []); @endphp
      @if($timeline)
        @foreach($timeline as $item)
          <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">{{ $item['year'] ?? '' }}</div>
            <p>{{ $item['text'] ?? '' }}</p>
          </div>
        @endforeach
      @else
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-year">2024</div>
          <p>Nace el proyecto conceptual de SANZAHRA en Ibiza como estudio-atelier multidisciplinar.</p>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-year">2025</div>
          <p>Se crean los primeros trabajos de servicios de SANZAHRA arropado por empresas del grupo, y se forma el equipo para la constituci&oacute;n y fundaci&oacute;n desde Ibiza, M&aacute;laga y C&oacute;rdoba. Lanzamiento en redes sociales a nivel conceptual y primeros trabajos de Branding y Arquitectura.</p>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-year">2026</div>
          <p>Nueva sede en el centro de M&aacute;laga y constituci&oacute;n de Sanzahra Atelier S.L. Lanzamiento de la web y consolidaci&oacute;n de &laquo;La Florecilla&raquo; como marca propia conceptual.</p>
        </div>
      @endif
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">Equipo</p>
      <h2 class="section-title reveal">Las personas<br>detr&aacute;s de la marca</h2>
    </div>
    <div class="team-grid reveal">
      @php $team = $page->blockByKey('team')?->get('members', []); @endphp
      @if($team)
        @foreach($team as $member)
          <div class="team-card">
            <div class="team-photo avatar-style">{{ strtoupper(substr($member['name'] ?? 'X', 0, 1)) }}</div>
            <h4>{{ $member['name'] ?? '' }}</h4>
            <span class="role">{{ $member['role'] ?? '' }}</span>
          </div>
        @endforeach
      @else
        <div class="team-card">
          <div class="team-photo avatar-style">T</div>
          <h4>Tamara Moreno Luna</h4>
          <span class="role">Moda y Marketing</span>
        </div>
        <div class="team-card">
          <div class="team-photo avatar-style">F</div>
          <h4>Florencio P&eacute;rez</h4>
          <span class="role">Creatividad</span>
        </div>
        <div class="team-card">
          <div class="team-photo avatar-style">A</div>
          <h4>Antonio Ariza</h4>
          <span class="role">Gesti&oacute;n</span>
        </div>
      @endif
    </div>
  </section>

  <section>
    <div class="container">
      <p class="section-label reveal">Nuestros Valores</p>
      <h2 class="section-title reveal">Lo que nos define</h2>
    </div>
    <div class="features features-row reveal">
      <div class="feature">
        <h4>Excelencia</h4>
        <p>La calidad no es negociable. Est&aacute;ndares exigentes en cada entrega.</p>
      </div>
      <div class="feature">
        <h4>Visi&oacute;n</h4>
        <p>Dise&ntilde;amos para perdurar, no para seguir tendencias pasajeras.</p>
      </div>
      <div class="feature">
        <h4>Integralidad</h4>
        <p>Unimos disciplinas bajo una sola direcci&oacute;n creativa coherente.</p>
      </div>
      <div class="feature">
        <h4>Discreci&oacute;n</h4>
        <p>Confidencialidad absoluta. El resultado importa m&aacute;s que el ruido.</p>
      </div>
    </div>
  </section>

  <section>
    <div class="cta-block">
      <p class="section-label">Trabaja con nosotros</p>
      <h2 class="section-title">&iquest;Listo para empezar?</h2>
      <p>Cada proyecto comienza con una conversaci&oacute;n sincera. Cu&eacute;ntanos tu idea y construyamos algo extraordinario juntos.</p>
      <a href="{{ route('page', 'contacto') }}" class="btn btn-dark">Escr&iacute;benos</a>
    </div>
  </section>

@endsection
