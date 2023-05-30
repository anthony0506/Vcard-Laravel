<?php

use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'role:user')->group(function () {
    //user dashboard route
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});
