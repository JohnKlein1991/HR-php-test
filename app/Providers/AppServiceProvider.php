<?php

namespace App\Providers;

use App\Services\Weather\OpenWeatherMap\OpenWeatherMapService;
use App\Services\Weather\WeatherServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WeatherServiceInterface::class, OpenWeatherMapService::class);
    }
}
