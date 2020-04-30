<?php

namespace Arbee\LaravelHydra\Tests\Stubs;

use Arbee\LaravelHydra\Contracts\HydraClass;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;

class SchemaHydraClass implements HydraClass
{
    public static function iri(): string
    {
        return 'http://schema.org/';
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
