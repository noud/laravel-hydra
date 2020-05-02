<?php

namespace Arbee\LaravelHydra\Tests\Stubs\Documents;

use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;

class RemoteIriSupportedClass implements SupportedClass
{
    public function iri(): string
    {
        return 'http://schema.org/';
    }

    public function documents(): string
    {
        return '';
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
