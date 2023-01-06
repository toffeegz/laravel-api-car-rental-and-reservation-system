<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionStatus\TransactionStatusController;

Route::prefix('company-information')->group(function() {
    Route::get('/', [TransactionStatusController::class, 'index'])->name('company_information.index');
    Route::post('/', [TransactionStatusController::class, 'store'])->name('company_information.store');
});