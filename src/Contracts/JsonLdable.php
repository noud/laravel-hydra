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
    public function type(): string;

    /**
     * Returns the attributes as JSON
     *
     * @return array
     */
    public function jsonLdAttributesToArray(): array;
}
