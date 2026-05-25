<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::with('blocks')->where('slug', 'inicio')->where('is_active', true)->first()
            ?? new Page(['slug' => 'inicio', 'title' => 'Inicio']);

        return view('pages.inicio', compact('page'));
    }

    public function show(string $slug)
    {
        $page = Page::with('blocks')->where('slug', $slug)->where('is_active', true)->first();

        if (!$page) {
            abort(404);
        }

        $viewName = 'pages.' . $slug;

        if (!view()->exists($viewName)) {
            abort(404);
        }

        return view($viewName, compact('page'));
    }
}
