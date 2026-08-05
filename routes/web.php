<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('/contacto', [ContactController::class, 'send'])->middleware('throttle:contact')->name('contact.send');
Route::get('/{slug}', [PageController::class, 'show'])->name('page')->where('slug', '[a-z0-9\-]+');
