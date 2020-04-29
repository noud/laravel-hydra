<?php

namespace Arbee\LaravelHydra;

use Illuminate\Support\ServiceProvider;

class HydraServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Config path not available in Lumen
        if (function_exists('config_path')) {
            $this->publishes(
                [
                __DIR__.'/config.php' => config_path('hydra.php'),
                ], 'config'
            );
        }
    }
}
