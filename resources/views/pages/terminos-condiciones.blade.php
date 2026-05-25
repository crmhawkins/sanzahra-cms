@extends('layouts.app')

@section('content')

  <main class="legal">
    @php $sections = $page->blockByKey('legal_sections')?->get('sections', []); @endphp
    @if($sections)
      <h1>{{ $page->title }}</h1>
      <p class="legal-meta">{{ $page->blockByKey('legal_sections')?->get('last_updated', 'Última actualización: Abril 2026') }}</p>
      @foreach($sections as $section)
        @if(!empty($section['heading']))
          <h2>{{ $section['heading'] }}</h2>
        @endif
        {!! $section['content'] ?? '' !!}
      @endforeach
    @else
      <h1>T&eacute;rminos y Condiciones</h1>
      <p class="legal-meta">&Uacute;ltima actualizaci&oacute;n: Abril 2026</p>

      <p>Las presentes condiciones regulan el acceso y uso del sitio web titularidad de SANZAHRA. El acceso y navegaci&oacute;n por este sitio implica la aceptaci&oacute;n sin reservas de los t&eacute;rminos recogidos en este documento.</p>

      <h2>1. Informaci&oacute;n general</h2>
      <p>En cumplimiento del deber de informaci&oacute;n establecido en la Ley 34/2002, de Servicios de la Sociedad de la Informaci&oacute;n y Comercio Electr&oacute;nico (LSSI-CE), se informa al usuario de que el titular del dominio <strong>sanzahra.com</strong> es SANZAHRA, con CIF B-00000000 y domicilio en Calle C&oacute;rdoba 6, 29001 M&aacute;laga (Espa&ntilde;a). Puedes contactar con nosotros en <a href="mailto:info@sanzahra.com">info@sanzahra.com</a>.</p>

      <h2>2. Objeto y &aacute;mbito de aplicaci&oacute;n</h2>
      <p>Las presentes condiciones tienen por objeto regular el acceso, navegaci&oacute;n y uso del sitio web, as&iacute; como las responsabilidades derivadas del mismo.</p>

      <h2>3. Condiciones de uso del sitio</h2>
      <p>El usuario se compromete a hacer un uso diligente, correcto y l&iacute;cito del sitio web y, en particular, a no utilizarlo para desarrollar actividades contrarias a la ley, la moral o el orden p&uacute;blico.</p>

      <h2>4. Propiedad intelectual e industrial</h2>
      <p>Todos los contenidos del sitio web son titularidad de SANZAHRA o, en su caso, cuenta con las correspondientes licencias de uso, y est&aacute;n protegidos por la normativa nacional e internacional sobre propiedad intelectual e industrial.</p>

      <h2>5. Responsabilidad</h2>
      <p>SANZAHRA no garantiza la disponibilidad y continuidad ininterrumpida del sitio web, si bien realiza sus mejores esfuerzos para mantenerlo operativo.</p>

      <h2>6. Servicios ofrecidos</h2>
      <p>A trav&eacute;s de este sitio web, SANZAHRA presenta con car&aacute;cter informativo sus servicios profesionales en las &aacute;reas de interiorismo, branding, moda, arquitectura, producci&oacute;n de eventos y asistencia ejecutiva.</p>

      <h2>7. Pol&iacute;tica de cookies</h2>
      <p>Este sitio web utiliza cookies propias y de terceros para ofrecer una mejor experiencia de navegaci&oacute;n y analizar el uso del sitio. Puedes obtener informaci&oacute;n detallada en nuestra <a href="{{ route('page', 'politica-privacidad') }}">Pol&iacute;tica de Privacidad</a>.</p>

      <h2>8. Protecci&oacute;n de datos</h2>
      <p>El tratamiento de los datos personales recabados a trav&eacute;s del sitio web se rige por lo dispuesto en nuestra <a href="{{ route('page', 'politica-privacidad') }}">Pol&iacute;tica de Privacidad</a>.</p>

      <h2>9. Modificaciones del sitio y condiciones</h2>
      <p>SANZAHRA se reserva el derecho de efectuar, sin previo aviso, las modificaciones que considere oportunas en su sitio web.</p>

      <h2>10. Legislaci&oacute;n aplicable</h2>
      <p>Las presentes condiciones se rigen e interpretan conforme a la legislaci&oacute;n espa&ntilde;ola. Para la resoluci&oacute;n de cualquier controversia, las partes se someten expresamente a los Juzgados y Tribunales de Madrid capital.</p>

      <h2>11. Contacto</h2>
      <p>Para cualquier duda o consulta relacionada con las presentes condiciones, puedes dirigirte a SANZAHRA a trav&eacute;s del correo electr&oacute;nico <a href="mailto:info@sanzahra.com">info@sanzahra.com</a> o escribiendo a nuestra direcci&oacute;n postal: Calle C&oacute;rdoba 6, 29001 M&aacute;laga.</p>
    @endif
  </main>

@endsection
