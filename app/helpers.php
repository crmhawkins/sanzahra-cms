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
