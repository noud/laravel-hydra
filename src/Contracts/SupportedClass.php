<?php

namespace Arbee\LaravelHydra\Contracts;

use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;

interface SupportedClass
{
    /**
     * Get the unique IRI for this class. If this is not a URL, it will be treated as a definition from the
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
     * Get the operations this class supports
     *
     * @return \Arbee\LaravelHydra\Hydra\SupportedOperationCollection
     */
    public function supportedOperations(): SupportedOperationCollection;
}
