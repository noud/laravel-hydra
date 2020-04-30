<?php

namespace Arbee\LaravelHydra\Hydra;

class SupportedProperty
{
    /**
     * @var boolean
     */
    protected $deprecated = false;

    /**
     * @var boolean
     */
    protected $readable = true;

    /**
     * @var boolean
     */
    protected $writable = true;

    /**
     * @var boolean
     */
    protected $required = false;

    /**
     * @var string
     */
    protected $type = 'hydra:SupportedProperty';

    /**
     * @param string $iri
     * @param \Arbee\LaravelHydra\Hydra\Property $property
     */
    public function __construct(string $iri, Property $property)
    {
        $this->iri = $iri;
        $this->property = $property;
    }

    /**
     * Mark the supported property as deprecated
     */
    public function deprecated()
    {
        $this->deprecated = true;
        return $this;
    }

    /**
     * Mark the supported property as read only
     */
    public function readOnly()
    {
        $this->writable = false;
        return $this;
    }

    /**
     * Mark the supported property as required
     */
    public function required()
    {
        $this->required = true;
        return $this;
    }

    /**
     * Mark the supported property write only
     */
    public function writeOnly()
    {
        $this->readable = false;
        return $this;
    }

    /**
     * Represent the supported property as an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            '@type' => $this->type,
            'hydra:property' => $this->property->toArray(),
            'owl:deprecated' => $this->deprecated,
            'hydra:required' => $this->required,
            'hydra:readable' => $this->readable,
            'hydra:writable' => $this->writable,
        ];
    }
}
