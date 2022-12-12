<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Base\BaseRepositoryInterface;
use App\Repositories\TransactionStatus\TransactionStatusRepository;
use App\Repositories\TransactionStatus\TransactionStatusRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(TransactionStatusRepositoryInterface::class, TransactionStatusRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
