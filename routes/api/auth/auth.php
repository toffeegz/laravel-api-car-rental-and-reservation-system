<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify');
// Route::post('/auth/send-reset-password', [AuthController::class, 'sendResetPassword'])->name('auth.sendPasswordReset');

Route::get('login/google', [AuthController::class, 'redirectToProvider'])->name('google.login')->middleware('web');
Route::get('login/google/callback', [AuthController::class, 'handleProviderCallback'])->name('google.callback')->middleware('web');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile'])->name('user.profile');
});
