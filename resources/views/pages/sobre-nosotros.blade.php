@extends('layouts.app')

@section('content')

  @php $hero = $page->blockByKey('hero_about'); @endphp
  <section class="page-hero about-hero">
    <div class="about-hero-bg"></div>
    <div class="page-hero-content">
      <p class="kicker">{{ $hero?->get('kicker', 'Sobre Nosotros') }}</p>
      <div class="about-brand">{{ $hero?->get('brand', 'SANZAHRA') }}</div>
      <p class="subtitle">{{ $hero?->get('subtitle', 'Una visión, múltiples disciplinas. Creamos donde la estética se encuentra con la estrategia.') }}</p>
    </div>
  </section>

  <section>
    <p class="pull-quote reveal">{!! $page->blockByKey('pull_quote')?->get('quote', 'Creemos que el verdadero lujo no grita: susurra. Vive en el detalle que pocos ven y todos sienten, en la coherencia silenciosa entre forma, espacio y prop&oacute;sito.') !!}</p>
  </section>

  <div class="full-image reveal" style="background-image:url('{{ image_url($page->blockByKey('full_image')?->get('image'), 'assets/img/extra/extra-02.jpg') }}')"></div>

  @php $filosofia = $page->blockByKey('filosofia'); @endphp
  <section>
    <div class="two-col">
      <div class="reveal">
        <p class="section-label">{{ $filosofia?->get('section_label', 'Filosofía') }}</p>
        <h2 class="section-title">{!! $filosofia?->get('title', 'La precisión es nuestra<br>forma de arte') !!}</h2>
        <p class="section-text">
          {!! $filosofia?->get('paragraph_1', 'Creemos que cada proyecto merece la misma dedicaci&oacute;n sin importar su escala. Desde la concepci&oacute;n de una marca hasta la producci&oacute;n de una pasarela, aplicamos el mismo rigor est&eacute;tico y estrat&eacute;gico.') !!}
        </p>
        <p class="section-text">
          {!! $filosofia?->get('paragraph_2', 'Nuestra multidisciplinariedad no es casualidad: es el resultado de entender que el lujo contempor&aacute;neo exige visiones integrales. Una marca de moda necesita algo m&aacute;s que una colecci&oacute;n, un evento algo m&aacute;s que producci&oacute;n, una identidad algo m&aacute;s que un logo.') !!}
        </p>
      </div>
      <div class="two-col-image reveal" style="background-image:url('{{ image_url($filosofia?->get('image'), 'assets/img/moda/moda-34-ilustraciones-rosa.jpg') }}')"></div>
    </div>
  </section>

  @php $stat = $page->blockByKey('stat_block'); @endphp
  <section class="bg-light">
    <div class="stat-block reveal">
      <div class="stat-num">{{ $stat?->get('number', '+50') }}</div>
      <div class="stat-text">
        <h3>{!! $stat?->get('title', 'proyectos de experiencia<br>de nuestro equipo') !!}</h3>
        <p>{{ $stat?->get('description', 'Marcas de moda propias y ajenas, pasarelas y desfiles, identidades corporativas, colaboraciones editoriales y producciones internacionales. Cada cifra es, en realidad, una historia hecha a medida.') }}</p>
      </div>
    </div>
  </section>

  @php $timelineBlock = $page->blockByKey('timeline'); $timeline = $timelineBlock?->get('items', []); @endphp
  <section>
    <div class="container">
      <p class="section-label reveal">{{ $timelineBlock?->get('section_label', 'Nuestra historia') }}</p>
      <h2 class="section-title reveal">{{ $timelineBlock?->get('title', 'Hitos del camino') }}</h2>
    </div>
    <div class="timeline reveal">
      @if($timeline)
        @foreach($timeline as $item)
          <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-year">{{ $item['year'] ?? '' }}</div>
            <p>{{ $item['description'] ?? '' }}</p>
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

  @php $equipoBlock = $page->blockByKey('equipo'); $team = $equipoBlock?->get('team', []); @endphp
  <section class="bg-light">
    <div class="container">
      <p class="section-label reveal">{{ $equipoBlock?->get('section_label', 'Equipo') }}</p>
      <h2 class="section-title reveal">{!! $equipoBlock?->get('title', 'Las personas<br>detr&aacute;s de la marca') !!}</h2>
    </div>
    <div class="team-grid reveal">
      @if($team)
        @foreach($team as $member)
          <div class="team-card">
            <div class="team-photo avatar-style">{{ $member['initials'] ?? mb_strtoupper(mb_substr($member['name'] ?? 'X', 0, 1)) }}</div>
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

  @php $valoresBlock = $page->blockByKey('valores'); $valores = $valoresBlock?->get('features', []); @endphp
  <section>
    <div class="container">
      <p class="section-label reveal">{{ $valoresBlock?->get('section_label', 'Nuestros Valores') }}</p>
      <h2 class="section-title reveal">{{ $valoresBlock?->get('title', 'Lo que nos define') }}</h2>
    </div>
    <div class="features features-row reveal">
      @if($valores)
        @foreach($valores as $feature)
          <div class="feature">
            <h4>{{ $feature['title'] ?? '' }}</h4>
            <p>{{ $feature['description'] ?? '' }}</p>
          </div>
        @endforeach
      @else
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
      @endif
    </div>
  </section>

  @php $cta = $page->blockByKey('cta_final'); @endphp
  <section>
    <div class="cta-block">
      <p class="section-label">{{ $cta?->get('section_label', 'Trabaja con nosotros') }}</p>
      <h2 class="section-title">{!! $cta?->get('title', '¿Listo para empezar?') !!}</h2>
      <p>{{ $cta?->get('description', 'Cada proyecto comienza con una conversación sincera. Cuéntanos tu idea y construyamos algo extraordinario juntos.') }}</p>
      <a href="{{ nav_url($cta?->get('button_url', 'contacto')) }}" class="btn btn-dark">{{ $cta?->get('button_text', 'Escríbenos') }}</a>
    </div>
  </section>

@endsection
