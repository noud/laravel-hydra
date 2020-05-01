<?php

namespace Arbee\LaravelHydra\Tests\Stubs;

use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;

class BasicSupportedClass implements SupportedClass
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
