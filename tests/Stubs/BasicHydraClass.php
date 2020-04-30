<?php

namespace Arbee\LaravelHydra\Tests\Stubs;

use Arbee\LaravelHydra\Contracts\HydraClass;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;

class BasicHydraClass implements HydraClass
{
    public static function iri(): string
    {
        return 'TestId';
    }

    public static function title(): string
    {
        return 'TestTitle';
    }

    public static function supportedProperties(): SupportedPropertyCollection
    {
        return new SupportedPropertyCollection();
    }

    public static function supportedOperations(): SupportedOperationCollection
    {
        return new SupportedOperationCollection();
    }
}
