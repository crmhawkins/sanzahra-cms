@php
  $favicon     = site('favicon');
  $faviconSvg  = str_ends_with(strtolower((string) $favicon), '.svg');
  $titleSuffix = site('title_suffix');
  $loaderText  = site('loader_text');
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="{{ $page->meta_description ?? '' }}" />
  <title>{{ $page->meta_title ?? $page->title }}@if($titleSuffix) — {{ $titleSuffix }}@endif</title>
  <link rel="icon" @if($faviconSvg)type="image/svg+xml" @endif href="{{ image_url($favicon) }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/style.css" />
</head>
<body{{ isset($bodyClass) ? ' class="'.$bodyClass.'"' : '' }}>

  <div id="loader"><span>{{ $loaderText }}</span></div>

  @include('partials.nav')

  <main>@yield('content')</main>

  @include('partials.footer')

  @include('partials.cookie-banner')

  <script src="/assets/script.js" defer></script>
</body>
</html>
