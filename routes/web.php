<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TocaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Rutas para el inicio de sesión
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');
});


//Rutas para el registro de usuarios
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register.submit');
});


Route::controller(TocaController::class)->group(function () {
    Route::get('/', 'index')->name('view.toca.index');
    Route::get('/create', 'create')->name('view.toca.create');
    Route::post('/store', 'store')->name('view.toca.store');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

