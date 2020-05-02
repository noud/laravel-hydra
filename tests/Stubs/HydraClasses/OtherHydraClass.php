<?php

namespace Arbee\LaravelHydra\Tests\Stubs\HydraClasses;

use Arbee\LaravelHydra\Contracts\JsonLdable;

class OtherHydraClass implements JsonLdable
{
    public function iri(): string
    {
        return '/other/1';
    }

    public function type(): string
    {
        return 'Other';
    }

    public function jsonLdAttributesToArray(): array
    {
        return ['title' => 'Other'];
    }
}
