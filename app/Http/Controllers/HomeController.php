<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
class HomeController extends Controller
{
    public function index()
    {
        $features = Cache::remember('home.features', 300, fn () => [
            ['title' => 'Fast by default', 'text' => 'Vite page chunks, production minification, and a small asset payload.'],
            ['title' => 'Image aware', 'text' => 'A 1.1 KB vector hero with intrinsic dimensions, plus a reusable lazy-image component for below-fold media.'],
            ['title' => 'Cache friendly', 'text' => 'Repeatable feature data and versioned build assets use browser-friendly caching.'],
        ]);

        return Inertia::render('Home', ['features' => $features]);
    }
}
