<?php

namespace Arbee\LaravelHydra\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [\Arbee\LaravelHydra\HydraServiceProvider::class];
    }
}
