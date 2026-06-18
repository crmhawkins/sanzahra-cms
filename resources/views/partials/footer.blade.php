@php
  $brandText = site('brand_text');
  $brandLogo = site('brand_logo');
  $columns   = site('footer_columns');
  $email     = site('contacto_email');
  $telefono  = site('contacto_telefono');
  $direccion = site('contacto_direccion');
  $instagram = site('redes_instagram');
  $linkedin  = site('redes_linkedin');
  $facebook  = site('redes_facebook');
  $copyright = str_replace('{year}', date('Y'), site('footer_copyright'));
  $legal     = site('footer_legal_links');
@endphp
<footer>
  <div class="footer-top">
    <div class="footer-brand">
      @if($brandLogo)
        <span class="footer-logo"><img src="{{ image_url($brandLogo) }}" alt="{{ $brandText }}" /></span>
      @else
        <span class="footer-logo">{{ $brandText }}</span>
      @endif
      <p>{{ site('footer_tagline') }}</p>
      @if($instagram || $linkedin || $facebook)
        <div class="footer-social">
          @if($instagram)<a href="{{ $instagram }}" target="_blank" rel="noopener" aria-label="Instagram">Instagram</a>@endif
          @if($linkedin)<a href="{{ $linkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn">LinkedIn</a>@endif
          @if($facebook)<a href="{{ $facebook }}" target="_blank" rel="noopener" aria-label="Facebook">Facebook</a>@endif
        </div>
      @endif
    </div>

    @foreach($columns as $col)
      <div class="footer-col">
        <h5>{{ $col['heading'] ?? '' }}</h5>
        <ul>
          @foreach($col['links'] ?? [] as $link)
            <li><a href="{{ nav_url($link['url'] ?? '/') }}">{{ $link['label'] ?? '' }}</a></li>
          @endforeach
        </ul>
      </div>
    @endforeach

    <div class="footer-col">
      <h5>Contacto</h5>
      <ul>
        <li><a href="mailto:{{ $email }}">{{ $email }}</a></li>
        <li><a href="tel:{{ preg_replace('/\s+/', '', $telefono) }}">{{ $telefono }}</a></li>
        <li>{{ $direccion }}</li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>{{ $copyright }}</p>
    <ul class="footer-links">
      @foreach($legal as $link)
        <li><a href="{{ nav_url($link['url'] ?? '/') }}">{{ $link['label'] ?? '' }}</a></li>
      @endforeach
    </ul>
  </div>
</footer>
