<?php

namespace Arbee\LaravelHydra\Hydra;

use Illuminate\Support\Collection;

class SupportedPropertyCollection extends Collection
{
    /**
     * Get the titles of all properties in the collection
     *
     * @return self
     */
    public function titles(): self
    {
        return $this->map(function (SupportedProperty $property) {
            return $property->title();
        });
    }

    /**
     * Transform this supported property collection into a contextualized value
     *
     * @return self
     */
    public function toContext(): self
    {
        return $this->mapWithKeys(function (SupportedProperty $property) {
            return [$property->title() => $property->propertyIri()];
        });
    }
}
