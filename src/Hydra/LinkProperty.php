<?php

namespace Arbee\LaravelHydra\Hydra;

class LinkProperty extends Property
{
    protected $iri;

    protected $supportedOperations;

    protected $type = 'hydra:Link';

    public function __construct(string $iri, SupportedOperationCollection $supportedOperations)
    {
        $this->iri = $iri;
        $this->supportedOperations = $supportedOperations;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), ['hydra:supportedOperations' => $this->supportedOperations]);
    }
}
