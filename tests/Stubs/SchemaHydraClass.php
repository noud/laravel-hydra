<?php

namespace Arbee\LaravelHydra\Tests\Stubs;

use Arbee\LaravelHydra\Contracts\HydraClass;

class SchemaHydraClass implements HydraClass
{
    public static function contextId(): string
    {
        return 'http://schema.org/';
    }

    public static function title(): string
    {
        return 'TestTitle';
    }
}
