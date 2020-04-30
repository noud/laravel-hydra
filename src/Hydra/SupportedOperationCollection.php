<?php

namespace Arbee\LaravelHydra\Hydra;

use Illuminate\Support\Collection;

class SupportedOperationCollection extends Collection
{
    /**
     * @param \Arbee\LaravelHydra\Hydra\Operation ...$operations
     */
    public function __construct(Operation ...$operations)
    {
        parent::__construct($operations);
    }
}
