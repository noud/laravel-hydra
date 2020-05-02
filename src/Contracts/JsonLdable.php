<?php

namespace Arbee\LaravelHydra\Contracts;

interface JsonLdable
{
    /**
     * Returns the IRI of this JsonLdable
     *
     * @return string
     */
    public function iri(): string;

    /**
     * Returns the IRI of the type of this JsonLdable
     *
     * @return string
     */
    public function ldType(): string;

    /**
     * Get an attribute value from the Hydra class
     *
     * @param mixed $key
     */
    public function getAttribute($key);

    /**
     * Returns the attributes as JSON
     *
     * @return array
     */
    public function jsonLdAttributesToArray(): array;
}
