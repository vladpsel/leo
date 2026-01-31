<?php

namespace App\Http\Controllers;

use App\Models\Server;
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

    public function servers(): Response
    {
        return Inertia::render('Dashboard', []);
    }

    public function server(string $alias)
    {
        $server = Server::where('alias', $alias)->first();
        if (!$server) {
            abort(404);
        }
        return Inertia::render('Server/View', [
            'server' => $server
        ]);
    }
}
