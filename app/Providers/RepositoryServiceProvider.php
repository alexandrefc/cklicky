<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\VenueInterface',
            'App\Http\Repositories\VenueRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\PointInterface',
            'App\Http\Repositories\PointRepository'
        );
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
