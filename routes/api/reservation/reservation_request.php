<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation\ReservationRequestController;

Route::prefix('reservation_request')->group(function() {
    Route::get('unit_details/{unit_id}', [ReservationRequestController::class, 'unitDetails'])->name('reservation_request.unit_details');
    Route::post('calendar', [ReservationRequestController::class, 'calendar'])->name('reservation_request.calendar');
    Route::post('reserve', [ReservationRequestController::class, 'show'])->name('reservation_request.reserve')->middleware('auth:sanctum');
});