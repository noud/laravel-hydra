<?php

namespace Arbee\LaravelHydra\Hydra;

class Property
{
    protected $iri;

    protected $type = 'rdf:Property';

    public function __construct(string $iri)
    {
        $this->iri = $iri;
    }

    public function toArray(): array
    {
        return [
            '@id' => $this->iri,
            '@type' => $this->type,
        ];
    }
}
