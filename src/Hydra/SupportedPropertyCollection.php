<?php

namespace Arbee\LaravelHydra\Hydra;

use Illuminate\Support\Collection;

class SupportedPropertyCollection extends Collection
{
    /**
     * Transform this supported property collection into a contextualized value
     */
    public function toContext(): self
    {
        return $this->mapWithKeys(function (SupportedProperty $property) {
            return [$property->title() => $property->propertyIri()];
        });
    }
}
