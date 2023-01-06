<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AdminController;

Route::prefix('administrators')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.list');
    Route::get('archive', [AdminController::class, 'archive'])->name('admin.archive');
    Route::get('/{admin}', [AdminController::class, 'show'])->name('admin.show');
    Route::post('/', [AdminController::class, 'store'])->name('admin.store');
    Route::put('/{admin}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{admin}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/restore/{admin}', [AdminController::class, 'restore'])->name('admin.restore');
});