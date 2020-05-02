<?php

namespace Arbee\LaravelHydra\Tests\Stubs\HydraClasses;

use Arbee\LaravelHydra\Contracts\JsonLdable;

class BasicHydraClass implements JsonLdable
{
    public function iri(): string
    {
        return '/basic/1';
    }

    public function type(): string
    {
        return 'Basic';
    }

    public function jsonLdAttributesToArray(): array
    {
        return ['title' => 'Basic'];
    }
}
