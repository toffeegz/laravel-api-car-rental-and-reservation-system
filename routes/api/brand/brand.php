<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Brand\BrandController;

Route::prefix('brands')->group(function() {
    Route::get('/', [BrandController::class, 'index'])->name('brand.list');
    Route::get('/{brand}', [BrandController::class, 'show'])->name('brand.show');
    Route::post('/', [BrandController::class, 'store'])->name('brand.store');
    Route::put('/{brand}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/{brand}', [BrandController::class, 'archive'])->name('brand.archive');
    Route::get('/restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
});