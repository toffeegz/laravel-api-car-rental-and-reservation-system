<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot_password');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change_password');

Route::get('login/google', [AuthController::class, 'redirectToProvider'])->name('google.login')->middleware('web');
Route::get('login/google/callback', [AuthController::class, 'handleProviderCallback'])->name('google.callback')->middleware('web');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile'])->name('user.profile');
    Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('user.update_profile');
    Route::post('/verify-id', [AuthController::class, 'verifyId'])->name('user.verify_id');
});
