<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaraController;
use Illuminate\Support\Facades\Route;



Route::get('/', [EvaraController::class,'index'])->name('home');
Route::get('/product-category', [EvaraController::class,'category'])->name('product-category');
Route::get('/product-details', [EvaraController::class,'product'])->name('product-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('category',CategoryController::class);
});
