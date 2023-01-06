<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionStatus\TransactionStatusController;

Route::prefix('transaction-statuses')->group(function() {
    Route::get('/', [TransactionStatusController::class, 'index'])->name('transaction_status.list');
    Route::get('/{transaction_status}', [TransactionStatusController::class, 'show'])->name('transaction_status.show');
    Route::post('/', [TransactionStatusController::class, 'store'])->name('transaction_status.store');
    Route::put('/{transaction_status}', [TransactionStatusController::class, 'update'])->name('transaction_status.update');
    Route::delete('/{transaction_status}', [TransactionStatusController::class, 'archive'])->name('transaction_status.archive');
    Route::get('/restore/{transaction_status}', [TransactionStatusController::class, 'restore'])->name('transaction_status.restore');
});