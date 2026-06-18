@php
  $menuLeft   = site('header_menu_left');
  $menuRight  = site('header_menu_right');
  $menuMobile = site('header_menu_mobile');
  $brandText  = site('brand_text');
  $brandLogo  = site('brand_logo');
  $navTransparent = site('nav_transparent') ? 'true' : 'false';
@endphp

<nav id="mainNav" data-transparent="{{ $navTransparent }}">
  <ul class="nav-links nav-links-left">
    @foreach($menuLeft as $item)
      @if(!empty($item['children']))
        <li class="has-dropdown">
          <a href="{{ nav_url($item['url'] ?? '/') }}" class="dropdown-toggle">{{ $item['label'] ?? '' }}</a>
          <ul class="dropdown">
            @foreach($item['children'] as $child)
              <li><a href="{{ nav_url($child['url'] ?? '/') }}">{{ $child['label'] ?? '' }}</a></li>
            @endforeach
          </ul>
        </li>
      @else
        <li><a href="{{ nav_url($item['url'] ?? '/') }}">{{ $item['label'] ?? '' }}</a></li>
      @endif
    @endforeach
  </ul>

  <a href="{{ url('/') }}" class="logo">
    @if($brandLogo)
      <img src="{{ image_url($brandLogo) }}" alt="{{ $brandText }}" />
    @else
      {{ $brandText }}
    @endif
  </a>

  <ul class="nav-links nav-links-right">
    @foreach($menuRight as $item)
      @if(!empty($item['children']))
        <li class="has-dropdown">
          <a href="{{ nav_url($item['url'] ?? '/') }}" class="dropdown-toggle">{{ $item['label'] ?? '' }}</a>
          <ul class="dropdown">
            @foreach($item['children'] as $child)
              <li><a href="{{ nav_url($child['url'] ?? '/') }}">{{ $child['label'] ?? '' }}</a></li>
            @endforeach
          </ul>
        </li>
      @else
        <li><a href="{{ nav_url($item['url'] ?? '/') }}">{{ $item['label'] ?? '' }}</a></li>
      @endif
    @endforeach
  </ul>

  <div class="hamburger" id="hamburger"><span></span><span></span><span></span></div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  @foreach($menuMobile as $item)
    <a href="{{ nav_url($item['url'] ?? '/') }}">{{ $item['label'] ?? '' }}</a>
  @endforeach
</div>
