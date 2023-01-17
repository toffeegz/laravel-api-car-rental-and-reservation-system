<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyInformation\CompanyInformationController;

Route::prefix('company-information')->group(function() {
    Route::get('/', [CompanyInformationController::class, 'index'])->name('company_information.index');
    Route::post('/', [CompanyInformationController::class, 'update'])->name('company_information.update');
});