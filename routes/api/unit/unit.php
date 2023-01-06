<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Unit\UnitController;

Route::prefix('units')->group(function() {
    Route::get('/', [UnitController::class, 'index'])->name('unit.list');
    Route::get('/{unit}', [UnitController::class, 'show'])->name('unit.show');
    Route::post('/', [UnitController::class, 'store'])->name('unit.store');
    Route::put('/{unit}', [UnitController::class, 'update'])->name('unit.update');
    Route::delete('/{unit}', [UnitController::class, 'archive'])->name('unit.archive');
    Route::get('/restore/{unit}', [UnitController::class, 'restore'])->name('unit.restore');
});