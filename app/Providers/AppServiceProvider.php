<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Utils\File\FileService;
use App\Services\Utils\File\FileServiceInterface;
use App\Services\Utils\Response\ResponseService;
use App\Services\Utils\Response\ResponseServiceInterface;

use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Reservation\ReservationService;
use App\Services\Reservation\ReservationServiceInterface;
use App\Services\Unit\UnitService;
use App\Services\Unit\UnitServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;

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
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(ReservationServiceInterface::class, ReservationService::class);
        $this->app->bind(UnitServiceInterface::class, UnitService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
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
