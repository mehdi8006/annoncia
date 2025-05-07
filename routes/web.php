<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[HomeController::class ,'homeshow']);
Route::get('/category/{category}', [HomeController::class, 'category'])->name('category');
Route::get('/details/{id}', [HomeController::class, 'detailshow'])->name('details');

// Routes pour l'authentification
Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('form');

// Routes pour l'authentification
