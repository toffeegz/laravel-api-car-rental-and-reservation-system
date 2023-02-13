<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Utils\File\FileService;
use App\Services\Utils\File\FileServiceInterface;
use App\Services\Utils\Response\ResponseService;
use App\Services\Utils\Response\ResponseServiceInterface;

use App\Services\Unit\UnitService;
use App\Services\Unit\UnitServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FileServiceInterface::class, FileService::class);
        $this->app->bind(ResponseServiceInterface::class, ResponseService::class);
        $this->app->bind(UnitServiceInterface::class, UnitService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
