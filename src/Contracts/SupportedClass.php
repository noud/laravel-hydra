<?php

namespace Arbee\LaravelHydra\Contracts;

use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;

interface SupportedClass
{
    /**
     * The class that this object documents
     *
     * @return string
     */
    public function hydraClass(): string;

    /**
     * Get the unique IRI for this class document. If this is not a URL, it will be treated as a definition from the
     * internal Hydra vocabulary
     *
     * @return string
     */
    public function iri(): string;

    /**
     * Get the class title
     *
     * @return string
     */
    public function title(): string;

    /**
     * Get the properties this class supports
     *
     * @return \Arbee\LaravelHydra\Hydra\SupportedPropertyCollection
     */
    public function supportedProperties(): SupportedPropertyCollection;

    /**
     * Return the values of the supported properties given an instance of the hydra class this documents
     *
     * @param \Arbee\LaravelHydra\Contracts\JsonLdable $hydraClass
     *
     * @return array
     */
    public function supportedPropertyValues(JsonLdable $hydraClass): array;

    /**
     * Get the operations this class supports
     *
     * @return \Arbee\LaravelHydra\Hydra\SupportedOperationCollection
     */
    public function supportedOperations(): SupportedOperationCollection;
}
