<?php

namespace Arbee\LaravelHydra\Tests\Stubs;

use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;

class BasicSupportedClass implements SupportedClass
{
    public function iri(): string
    {
        return 'TestId';
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
