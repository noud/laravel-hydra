<?php

namespace Arbee\LaravelHydra;

use Arbee\LaravelHydra\Hydra\SupportedClassCollection;
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
            SupportedClassCollection::class,
            function () {
                $classObjects = array_map(function ($class) {
                    return new $class();
                }, $this->supportedClasses);
                return empty($classObjects) ? new SupportedClassCollection()
                    : new SupportedClassCollection(...$classObjects);
            }
        );
    }
}
