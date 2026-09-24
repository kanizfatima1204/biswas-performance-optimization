<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerformanceController;
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/performance-report', [PerformanceController::class,'index'])->name('performance.report');
