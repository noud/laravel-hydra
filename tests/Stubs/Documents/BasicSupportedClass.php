<?php

namespace Arbee\LaravelHydra\Tests\Stubs\Documents;

use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use Arbee\LaravelHydra\Tests\Stubs\HydraClasses\BasicHydraClass;

class BasicSupportedClass implements SupportedClass
{
    public function iri(): string
    {
        return 'TestId';
    }

    public function documents(): string
    {
        return BasicHydraClass::class;
    }

    public function title(): string
    {
        return 'TestTitle';
    }

    public function supportedProperties(): SupportedPropertyCollection
    {
        return new SupportedPropertyCollection();
    }

    public function supportedOperations(): SupportedOperationCollection
    {
        return new SupportedOperationCollection();
    }
}
