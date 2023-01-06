<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation\ReservationController;

Route::prefix('brands')->group(function() {
    Route::get('/', [ReservationController::class, 'index'])->name('brand.list');
    Route::get('/{brand}', [ReservationController::class, 'show'])->name('brand.show');
    Route::post('/', [ReservationController::class, 'store'])->name('brand.store');
    Route::put('/{brand}', [ReservationController::class, 'update'])->name('brand.update');
    Route::delete('/{brand}', [ReservationController::class, 'archive'])->name('brand.archive');
    Route::get('/restore/{brand}', [ReservationController::class, 'restore'])->name('brand.restore');
});