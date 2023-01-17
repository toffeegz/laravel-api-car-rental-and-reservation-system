<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionalPost\PromotionalPostController;

Route::prefix('promotional-posts')->group(function() {
    Route::get('/', [PromotionalPostController::class, 'index'])->name('promotional_post.list');
    Route::get('/archives', [PromotionalPostController::class, 'archives'])->name('promotional_post.archives');
    Route::get('/{promotional_post}', [PromotionalPostController::class, 'show'])->name('promotional_post.show');
    Route::post('/', [PromotionalPostController::class, 'store'])->name('promotional_post.store');
    Route::put('/{promotional_post}', [PromotionalPostController::class, 'update'])->name('promotional_post.update');
    Route::delete('/{promotional_post}', [PromotionalPostController::class, 'delete'])->name('promotional_post.delete');
    Route::get('/restore/{promotional_post}', [PromotionalPostController::class, 'restore'])->name('promotional_post.restore');
});