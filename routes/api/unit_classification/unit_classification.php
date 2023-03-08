<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitClassification\UnitClassificationController;

Route::prefix('unit_classifications')->group(function() {
    Route::get('/', [UnitClassificationController::class, 'index'])->name('unit_classification.list');
    Route::get('/{unit_classification}', [UnitClassificationController::class, 'show'])->name('unit_classification.show');
    Route::post('/', [UnitClassificationController::class, 'store'])->name('unit_classification.store');
    Route::put('/{unit_classification}', [UnitClassificationController::class, 'update'])->name('unit_classification.update');
    Route::delete('/{unit_classification}', [UnitClassificationController::class, 'archive'])->name('unit_classification.archive');
    Route::get('/restore/{unit_classification}', [UnitClassificationController::class, 'restore'])->name('unit_classification.restore');
});