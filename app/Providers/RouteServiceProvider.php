<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // ADMINISTRATOR
            // pending

            // BRANCH
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api/branch/branch.php'));

            // BRAND
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/brand/brand.php'));

            // COMPANY INFORMATION
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/company_information/company_information.php'));

            // CUSTOMER
            // pending

            // INCLUSION
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/inclusion/inclusion.php'));

            // INCLUSION TYPE
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/inclusion_type/inclusion_type.php'));

            // PROMOTIONAL POST
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/promotional_post/promotional_post.php'));

            // RESERVATION
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/reservation/reservation.php'));

            // ROLE
            // pending

            // TRANSACTION
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/transaction/transaction.php')); 

            // TRANSACTION STATUS
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/transaction_status/transaction_status.php'));

            // UNIT
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api/unit/unit.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
