<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation\ReservationController;

Route::prefix('reservations')->group(function() {
    Route::get('/', [ReservationController::class, 'index'])->name('reservation.list');
    Route::get('/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::post('/', [ReservationController::class, 'store'])->name('reservation.store');
    Route::put('/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::delete('/{reservation}', [ReservationController::class, 'archive'])->name('reservation.archive');
    Route::get('/restore/{reservation}', [ReservationController::class, 'restore'])->name('reservation.restore');
});