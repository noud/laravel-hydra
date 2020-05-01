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
    protected $type = Vocabulary::CLASS_PROPERTY;

    /**
     * @param string $iri
     */
    public function __construct(string $iri)
    {
        $this->iri = $iri;
    }

    /**
     * Get the IRI
     *
     * @return string
     */
    public function iri(): string
    {
        return $this->iri;
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
