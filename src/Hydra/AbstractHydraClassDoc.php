<?php

namespace Arbee\LaravelHydra\Hydra;

use Arbee\LaravelHydra\Contracts\JsonLdable;
use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Exceptions\MismatchedContextException;

abstract class AbstractHydraClassDoc implements SupportedClass
{
    abstract public function hydraClass(): string;

    /**
     * Get the unique IRI for this class document. If this is not a URL, it will be treated as a definition from the
     * internal Hydra vocabulary
     *
     * @return string
     */
    abstract public function iri(): string;

    /**
     * Get the class title
     *
     * @return string
     */
    abstract public function title(): string;

    /**
     * Get the properties this class supports
     *
     * @return \Arbee\LaravelHydra\Hydra\SupportedPropertyCollection
     */
    abstract public function supportedProperties(): SupportedPropertyCollection;

    /**
     * Get the operations this class supports
     *
     * @return \Arbee\LaravelHydra\Hydra\SupportedOperationCollection
     */
    abstract public function supportedOperations(): SupportedOperationCollection;

    /**
     * Get the values of the supported properties from the provided hydra class
     *
     * @param \Arbee\LaravelHydra\Contracts\JsonLdable $hydraClass
     */
    public function supportedPropertyValues(JsonLdable $hydraClass)
    {
        $this->assertDocuments($hydraClass);
        return $this->supportedProperties()->mapWithKeys(function ($property) use ($hydraClass) {
            return [$property->title() => $hydraClass->getAttribute($property->title())];
        })->reject(function ($value) {
            return is_null($value);
        });
    }

    /**
     * Assert that this class documents the provided hydra class
     *
     * @param \Arbee\LaravelHydra\Contracts\JsonLdable $hydraClass
     * @throws \Arbee\LaravelHydra\Exceptions\MismatchedContextException
     */
    protected function assertDocuments(JsonLdable $hydraClass)
    {
        if ($this->hydraClass() !== get_class($hydraClass)) {
            throw new MismatchedContextException($this, $hydraClass);
        }
    }
}
