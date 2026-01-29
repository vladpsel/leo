<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function home(): View|RedirectResponse
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('home');
    }

    public function dashboard(): Response
    {
        return Inertia::render('Dashboard', ['name' => 'John']);
    }
}
