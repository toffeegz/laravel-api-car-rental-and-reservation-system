<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CustomerController;

Route::prefix('customers')->group(function() {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.list');
    Route::get('archive', [CustomerController::class, 'archive'])->name('customer.archive');
    Route::get('/{customer}', [CustomerController::class, 'show'])->name('customer.show');
    Route::post('/', [CustomerController::class, 'store'])->name('customer.store');
    Route::put('/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/{customer}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/restore/{customer}', [CustomerController::class, 'restore'])->name('customer.restore');
});