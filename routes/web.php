<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;


// Guest Routes (Only for users NOT logged in)

Route::middleware('guest')->group(function () {
    route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    route::post('/login', [AuthController::class, 'login']);
    route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    route::post('/register', [AuthController::class, 'register']);
});


// Authenticated Routes (only for users who are loggied in)
Route::middleware('auth')->group(function () {
    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Root URL - Redirect to login or Dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});
