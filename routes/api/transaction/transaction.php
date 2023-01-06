<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Transaction\TransactionController;

Route::prefix('transactions')->group(function() {
    Route::get('/', [TransactionController::class, 'index'])->name('transaction.list');
    Route::get('/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::post('/', [TransactionController::class, 'store'])->name('transaction.store');
    Route::put('/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('/{transaction}', [TransactionController::class, 'archive'])->name('transaction.archive');
    Route::get('/restore/{transaction}', [TransactionController::class, 'restore'])->name('transaction.restore');
});