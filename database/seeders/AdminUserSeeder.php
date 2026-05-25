<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'hawkins@hawkins.es'],
            [
                'name' => 'Hawkins',
                'password' => Hash::make('Hawkins2026!'),
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'antonio@sanzahra.com'],
            [
                'name' => 'Antonio Ariza',
                'password' => Hash::make('Sanzahra2026!'),
                'email_verified_at' => now(),
            ]
        );
    }
}
