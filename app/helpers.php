<?php

if (!function_exists('image_url')) {
    function image_url(?string $path, ?string $fallback = null): string {
        if (!$path) return $fallback ? asset($fallback) : '';
        if (str_starts_with($path, 'uploads/')) return asset('storage/' . $path);
        if (str_starts_with($path, '/storage/')) return asset(ltrim($path, '/'));
        if (str_starts_with($path, 'http')) return $path;
        return asset($path);
    }
}

if (!function_exists('site')) {
    /**
     * Valor global del sitio, editable por el community manager.
     * Lee primero de `settings` (cacheado) y, si no hay valor, cae al
     * default de config/site.php. Garantiza que la web nunca quede vacía.
     */
    function site(string $key, mixed $default = null): mixed {
        $value = \App\Models\Setting::get($key);

        if ($value === null || $value === '' || $value === []) {
            return $default !== null ? $default : config('site.' . $key);
        }

        return $value;
    }
}

if (!function_exists('nav_url')) {
    /**
     * Convierte un valor de menú (editable) en una URL real.
     *   '/'                    -> home
     *   'http(s)://...'        -> tal cual (enlace externo)
     *   '/ruta-absoluta'       -> url('/ruta-absoluta')
     *   'slug'                 -> route('page', 'slug')
     *   'slug#ancla'           -> route('page', 'slug').'#ancla'
     */
    function nav_url(?string $value): string {
        $value = trim((string) $value);

        if ($value === '' || $value === '/') return url('/');
        if (str_starts_with($value, 'http')) return $value;
        if (str_starts_with($value, '/'))   return url($value);

        [$slug, $hash] = array_pad(explode('#', $value, 2), 2, null);
        $base = ($slug === '' || $slug === '/') ? url('/') : route('page', $slug);

        return $hash !== null && $hash !== '' ? $base . '#' . $hash : $base;
    }
}
