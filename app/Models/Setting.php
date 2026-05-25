<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
        'label',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    protected static function booted(): void
    {
        static::saved(fn ($s) => Cache::forget("setting.{$s->key}"));
        static::deleted(fn ($s) => Cache::forget("setting.{$s->key}"));
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::remember("setting.{$key}", now()->addHour(), function () use ($key, $default) {
            return static::where('key', $key)->first()?->value ?? $default;
        });
    }

    public static function set(string $key, mixed $value, string $group = 'general', ?string $label = null): self
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group, 'label' => $label]
        );
    }
}
