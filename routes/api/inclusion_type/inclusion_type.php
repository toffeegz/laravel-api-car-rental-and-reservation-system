<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InclusionType\InclusionTypeController;

Route::prefix('inclusion-types')->group(function() {
    Route::get('/', [InclusionTypeController::class, 'index'])->name('inclusion_type.list');
    Route::get('/{inclusion_type}', [InclusionTypeController::class, 'show'])->name('inclusion_type.show');
    Route::post('/', [InclusionTypeController::class, 'store'])->name('inclusion_type.store');
    Route::put('/{inclusion_type}', [InclusionTypeController::class, 'update'])->name('inclusion_type.update');
    Route::delete('/{inclusion_type}', [InclusionTypeController::class, 'archive'])->name('inclusion_type.archive');
    Route::get('/restore/{inclusion_type}', [InclusionTypeController::class, 'restore'])->name('inclusion_type.restore');
});