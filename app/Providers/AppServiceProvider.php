<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Utils\ResponseService;
use App\Services\Utils\ResponseServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResponseServiceInterface::class, ResponseService::class);
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
