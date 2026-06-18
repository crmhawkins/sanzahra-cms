<div id="cookieBanner" role="dialog" aria-label="Aviso de cookies">
  <h4 class="cookie-title">{{ site('cookie_title') }}</h4>
  <p class="cookie-text">{{ site('cookie_text') }} Más información en nuestra <a href="{{ nav_url('politica-privacidad') }}">política de privacidad</a>.</p>
  <div class="cookie-actions">
    <button class="accept" data-cookie-action="accepted">{{ site('cookie_accept') }}</button>
    <button class="reject" data-cookie-action="rejected">{{ site('cookie_reject') }}</button>
  </div>
</div>
