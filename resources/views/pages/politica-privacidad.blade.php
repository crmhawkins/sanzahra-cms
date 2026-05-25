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
      <h1>Pol&iacute;tica de Privacidad</h1>
      <p class="legal-meta">&Uacute;ltima actualizaci&oacute;n: Abril 2026</p>

      <p>En SANZAHRA nos tomamos muy en serio la protecci&oacute;n de los datos personales de nuestros usuarios, clientes y visitantes. Esta Pol&iacute;tica de Privacidad describe c&oacute;mo recogemos, utilizamos y protegemos la informaci&oacute;n que nos facilitas a trav&eacute;s de este sitio web, en cumplimiento del Reglamento (UE) 2016/679 General de Protecci&oacute;n de Datos (RGPD) y de la Ley Org&aacute;nica 3/2018, de Protecci&oacute;n de Datos Personales y garant&iacute;a de los derechos digitales (LOPDGDD).</p>

      <h2>1. Responsable del tratamiento</h2>
      <p>El responsable del tratamiento de los datos personales recabados a trav&eacute;s de este sitio web es SANZAHRA, con domicilio social en Calle C&oacute;rdoba 6, 29001 M&aacute;laga (Espa&ntilde;a), provista de CIF B-00000000 y direcci&oacute;n de contacto <a href="mailto:info@sanzahra.com">info@sanzahra.com</a>.</p>

      <h2>2. Finalidades del tratamiento</h2>
      <p>Tratamos los datos personales que nos facilitas con las siguientes finalidades: (i) gestionar y responder a las consultas o solicitudes de informaci&oacute;n enviadas a trav&eacute;s del formulario de contacto o por correo electr&oacute;nico; (ii) remitir comunicaciones comerciales e informaci&oacute;n sobre nuestros servicios cuando hayas prestado tu consentimiento para ello (newsletter); (iii) la prestaci&oacute;n y ejecuci&oacute;n de los servicios profesionales contratados, as&iacute; como la gesti&oacute;n contable, fiscal y administrativa derivada de dicha relaci&oacute;n.</p>

      <h2>3. Base legal</h2>
      <p>La base jur&iacute;dica para el tratamiento de tus datos es el consentimiento expreso que prestas al remitirnos un formulario o suscribirte a nuestra newsletter; la ejecuci&oacute;n del contrato de prestaci&oacute;n de servicios cuando eres cliente; y el inter&eacute;s leg&iacute;timo de SANZAHRA en mantener la relaci&oacute;n comercial existente y mejorar los servicios ofrecidos.</p>

      <h2>4. Destinatarios</h2>
      <p>Con car&aacute;cter general, los datos personales no ser&aacute;n comunicados a terceros, salvo obligaci&oacute;n legal o cuando sea estrictamente necesario para la prestaci&oacute;n del servicio.</p>

      <h2>5. Conservaci&oacute;n de los datos</h2>
      <p>Los datos personales se conservar&aacute;n durante el tiempo necesario para cumplir con la finalidad para la que fueron recabados y, en todo caso, durante los plazos legalmente establecidos.</p>

      <h2>6. Derechos del interesado</h2>
      <p>Puedes ejercer en cualquier momento tus derechos de <strong>Acceso, Rectificaci&oacute;n, Supresi&oacute;n, Oposici&oacute;n, Portabilidad y Limitaci&oacute;n</strong> del tratamiento dirigiendo una solicitud a <a href="mailto:info@sanzahra.com">info@sanzahra.com</a>.</p>

      <h2>7. Cookies</h2>
      <p>Este sitio web utiliza cookies propias y de terceros con finalidades t&eacute;cnicas, de personalizaci&oacute;n y anal&iacute;ticas.</p>

      <h2>8. Seguridad</h2>
      <p>SANZAHRA ha adoptado las medidas t&eacute;cnicas y organizativas apropiadas para garantizar un nivel de seguridad adecuado al riesgo del tratamiento.</p>

      <h2>9. Menores</h2>
      <p>Los servicios ofrecidos a trav&eacute;s de este sitio web no est&aacute;n dirigidos a menores de catorce (14) a&ntilde;os.</p>

      <h2>10. Modificaciones</h2>
      <p>SANZAHRA se reserva el derecho a modificar la presente Pol&iacute;tica de Privacidad para adaptarla a novedades legislativas o jurisprudenciales.</p>
    @endif
  </main>

@endsection
