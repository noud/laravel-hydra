<?php

namespace Arbee\LaravelHydra\Tests;

use Arbee\LaravelHydra\HydraServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [HydraServiceProvider::class];
    }
}
