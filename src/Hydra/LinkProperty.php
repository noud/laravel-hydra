<?php

namespace Arbee\LaravelHydra\Hydra;

class LinkProperty extends Property
{
    /**
     * @var string
     */
    protected $iri;

    /**
     * @var \Arbee\LaravelHydra\Hydra\SupportedOperationCollection
     */
    protected $supportedOperations;

    /**
     * @var string
     */
    protected $type = Vocabulary::CLASS_LINK;

    /**
     * @param string $iri
     * @param \Arbee\LaravelHydra\Hydra\SupportedOperationCollection $supportedOperations
     */
    public function __construct(string $iri, SupportedOperationCollection $supportedOperations)
    {
        $this->iri = $iri;
        $this->supportedOperations = $supportedOperations;
    }

    /**
     * Represent the link property as an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [Vocabulary::SUPPORTED_OPERATIONS => $this->supportedOperations]);
    }
}
