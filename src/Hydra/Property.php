<?php

namespace Arbee\LaravelHydra\Hydra;

class Property
{
    /**
     * @var string
     */
    protected $iri;

    /**
     * @var string
     */
    protected $type = 'rdf:Property';

    /**
     * @param string $iri
     */
    public function __construct(string $iri)
    {
        $this->iri = $iri;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            '@id' => $this->iri,
            '@type' => $this->type,
        ];
    }
}
