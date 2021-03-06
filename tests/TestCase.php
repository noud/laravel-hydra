<?php

namespace Arbee\LaravelHydra\Tests;

use Arbee\LaravelHydra\HydraServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [HydraServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.debug', true);
        $app['config']->set('hydra.docs_url', '/docs');
        $app['config']->set('hydra.context_base_url', '/context');
    }
}
