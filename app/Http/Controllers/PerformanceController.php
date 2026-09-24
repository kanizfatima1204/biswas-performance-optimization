<?php
namespace App\Http\Controllers;
use App\Models\PerformanceMetric;
use Inertia\Inertia;
class PerformanceController extends Controller
{
    public function index()
    {
        return Inertia::render('Performance/Index', [
            'metrics' => PerformanceMetric::query()
                ->orderBy('device')
                ->orderBy('label')
                ->get(),
        ]);
    }
}
