<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Option\OptionController;

Route::prefix('options')->group(function() {
    Route::get('/list-of-valid-ids', [OptionController::class, 'listValidIds'])->name('option.listValidIds');
});