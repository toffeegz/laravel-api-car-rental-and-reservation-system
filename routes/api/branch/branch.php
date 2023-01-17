<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Branch\BranchController;

Route::prefix('branches')->group(function() {
    Route::get('/', [BranchController::class, 'index'])->name('branch.list');
    Route::get('/archives', [BranchController::class, 'archives'])->name('branch.archives');
    Route::get('/{branch}', [BranchController::class, 'show'])->name('branch.show');
    Route::post('/', [BranchController::class, 'store'])->name('branch.store');
    Route::put('/{branch}', [BranchController::class, 'update'])->name('branch.update');
    Route::delete('/{branch}', [BranchController::class, 'delete'])->name('branch.delete');
    Route::get('/restore/{branch}', [BranchController::class, 'restore'])->name('branch.restore');
});