@php use App\Models\Setting; @endphp
<footer>
  <div class="footer-top">
    <div class="footer-brand">
      <span class="footer-logo">SANZAHRA</span>
      <p>Empresa matriz creativa multidisciplinar. Moda, branding, producci&oacute;n de eventos e interiorismo bajo una misma visi&oacute;n.</p>
    </div>
    <div class="footer-col">
      <h5>Navegaci&oacute;n</h5>
      <ul>
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('page', 'sobre-nosotros') }}">Sobre Nosotros</a></li>
        <li><a href="{{ route('page', 'servicios') }}">Servicios</a></li>
        <li><a href="{{ route('page', 'portfolio') }}">Portfolio</a></li>
        <li><a href="{{ route('page', 'contacto') }}">Contacto</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Servicios</h5>
      <ul>
        <li><a href="{{ route('page', 'branding') }}">Branding</a></li>
        <li><a href="{{ route('page', 'interiorismo') }}">Interiorismo</a></li>
        <li><a href="{{ route('page', 'moda') }}">Moda</a></li>
        <li><a href="{{ route('page', 'arquitectura') }}">Arquitectura</a></li>
        <li><a href="{{ route('page', 'event-producer') }}">Event Producer</a></li>
        <li><a href="{{ route('page', 'asistencia-ejecutiva') }}">Asistencia Ejecutiva</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Contacto</h5>
      <ul>
        <li><a href="mailto:{{ Setting::get('contacto_email', 'info@sanzahra.com') }}">{{ Setting::get('contacto_email', 'info@sanzahra.com') }}</a></li>
        <li><a href="tel:{{ preg_replace('/\s+/', '', Setting::get('contacto_telefono', '+34 646 63 95 58')) }}">{{ Setting::get('contacto_telefono', '+34 646 63 95 58') }}</a></li>
        <li>{{ Setting::get('contacto_direccion', 'Calle Córdoba 6, 29001 Málaga') }}</li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; {{ date('Y') }} SANZAHRA. Todos los derechos reservados.</p>
    <ul class="footer-links">
      <li><a href="{{ route('page', 'politica-privacidad') }}">Pol&iacute;tica de Privacidad</a></li>
      <li><a href="{{ route('page', 'terminos-condiciones') }}">T&eacute;rminos y Condiciones</a></li>
    </ul>
  </div>
</footer>
