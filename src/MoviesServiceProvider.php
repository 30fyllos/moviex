<?php

namespace Go4tech\Moviex;

use Illuminate\Support\ServiceProvider;
use Go4tech\Moviex\Console\InstallMoviex;


class MoviesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register the the installation command via CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallMoviex::class,
            ]);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    { 
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'moviex');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('moviex.php'),
            ], 'moviex-config');
        }
        
    }
}
