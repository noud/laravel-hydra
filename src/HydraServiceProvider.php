<?php

namespace Arbee\LaravelHydra;

use Arbee\LaravelHydra\Http\Resources\EntrypointClass;
use Illuminate\Support\ServiceProvider;

class HydraServiceProvider extends ServiceProvider
{
    /**
     * The classes that are supported by the Hydra API
     *
     * @var array
     */
    protected $supportedClasses = [];

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
                [__DIR__.'/config.php' => config_path('hydra.php')],
                'config'
            );
        }
    }

    /**
     * Register services for the application
     */
    public function register()
    {
        $this->app->singleton(
            HydraClassRegistry::class,
            function () {
                return new HydraClassRegistry($this->supportedClasses);
            }
        );
    }
}
