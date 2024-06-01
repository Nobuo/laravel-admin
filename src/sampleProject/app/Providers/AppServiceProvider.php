<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\StockServiceInterface;
use App\Services\StockService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StockServiceInterface::class, StockService::class);
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
