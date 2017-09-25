<?php

namespace Ngiasim\Aramex;

use Illuminate\Support\ServiceProvider;

class AramexServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'timezones');
        $this->publishes([
        __DIR__.'/views' => base_path('resources/views/ngiasim/timezones'),
        ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Ngiasim\Aramex\TimezonesController');
        $this->app->make('Ngiasim\Aramex\AramexShipment');
    }
}