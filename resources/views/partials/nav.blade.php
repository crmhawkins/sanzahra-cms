<nav id="mainNav" data-transparent="true">
  <ul class="nav-links nav-links-left">
    <li><a href="{{ url('/') }}">Inicio</a></li>
    <li><a href="{{ route('page', 'sobre-nosotros') }}">Sobre Nosotros</a></li>
    <li class="has-dropdown">
      <a href="{{ route('page', 'servicios') }}" class="dropdown-toggle">Servicios</a>
      <ul class="dropdown">
        <li><a href="{{ route('page', 'servicios') }}">Ver todos</a></li>
        <li><a href="{{ route('page', 'moda') }}">Moda</a></li>
        <li><a href="{{ route('page', 'branding') }}">Branding</a></li>
        <li><a href="{{ route('page', 'event-producer') }}">Producci&oacute;n de Eventos</a></li>
        <li><a href="{{ route('page', 'interiorismo') }}">Interiorismo</a></li>
        <li><a href="{{ route('page', 'asistencia-ejecutiva') }}">Asistencia Ejecutiva</a></li>
        <li><a href="{{ route('page', 'arquitectura') }}">Arquitectura</a></li>
      </ul>
    </li>
    <li><a href="{{ route('page', 'portfolio') }}">Portfolio</a></li>
  </ul>
  <a href="{{ url('/') }}" class="logo">SANZAHRA</a>
  <ul class="nav-links nav-links-right">
    <li class="has-dropdown">
      <a href="{{ route('page', 'moda') }}" class="dropdown-toggle">Moda</a>
      <ul class="dropdown">
        <li><a href="{{ route('page', 'moda') }}#marcas-propias">Marcas propias</a></li>
        <li><a href="{{ route('page', 'moda') }}#colaboraciones">Colaboraciones</a></li>
        <li><a href="{{ route('page', 'moda') }}#talento">Talento</a></li>
        <li><a href="{{ route('page', 'moda') }}#identidad">Identidad de marcas</a></li>
      </ul>
    </li>
    <li><a href="{{ route('page', 'branding') }}">Branding</a></li>
    <li><a href="{{ route('page', 'event-producer') }}">Producci&oacute;n de Eventos</a></li>
    <li><a href="{{ route('page', 'interiorismo') }}">Interiorismo</a></li>
    <li><a href="{{ route('page', 'contacto') }}">Contacto</a></li>
  </ul>
  <div class="hamburger" id="hamburger"><span></span><span></span><span></span></div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <a href="{{ url('/') }}">Inicio</a>
  <a href="{{ route('page', 'sobre-nosotros') }}">Sobre Nosotros</a>
  <a href="{{ route('page', 'servicios') }}">Servicios</a>
  <a href="{{ route('page', 'portfolio') }}">Portfolio</a>
  <a href="{{ route('page', 'moda') }}">Moda</a>
  <a href="{{ route('page', 'branding') }}">Branding</a>
  <a href="{{ route('page', 'event-producer') }}">Producci&oacute;n de Eventos</a>
  <a href="{{ route('page', 'interiorismo') }}">Interiorismo</a>
  <a href="{{ route('page', 'asistencia-ejecutiva') }}">Asistencia Ejecutiva</a>
  <a href="{{ route('page', 'arquitectura') }}">Arquitectura</a>
  <a href="{{ route('page', 'contacto') }}">Contacto</a>
</div>
