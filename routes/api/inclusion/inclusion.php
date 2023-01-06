<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inclusion\InclusionController;

Route::prefix('inclusions')->group(function() {
    Route::get('/', [InclusionController::class, 'index'])->name('inclusion.list');
    Route::get('/{inclusion}', [InclusionController::class, 'show'])->name('inclusion.show');
    Route::post('/', [InclusionController::class, 'store'])->name('inclusion.store');
    Route::put('/{inclusion}', [InclusionController::class, 'update'])->name('inclusion.update');
    Route::delete('/{inclusion}', [InclusionController::class, 'archive'])->name('inclusion.archive');
    Route::get('/restore/{inclusion}', [InclusionController::class, 'restore'])->name('inclusion.restore');
});