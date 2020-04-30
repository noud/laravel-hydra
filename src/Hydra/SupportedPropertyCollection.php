<?php

namespace Arbee\LaravelHydra\Hydra;

use Illuminate\Support\Collection;

class SupportedPropertyCollection extends Collection
{
    /**
     * @param \Arbee\LaravelHydra\Hydra\SupportedProperty ...$properties
     */
    public function __construct(SupportedProperty ...$properties)
    {
        parent::__construct($properties);
    }
}
