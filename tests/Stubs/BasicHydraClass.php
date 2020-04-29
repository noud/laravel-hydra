<?php

namespace Arbee\LaravelHydra\Tests\Stubs;

use Arbee\LaravelHydra\Contracts\HydraClass;

class BasicHydraClass implements HydraClass
{
    public static function contextId(): string
    {
        return 'TestId';
    }

    public static function title(): string
    {
        return 'TestTitle';
    }
}
