<?php

namespace Arbee\LaravelHydra\Contracts;

interface HydraClass
{
    /**
     * Get the context identifier for this class. If this is not a URL, it will be treated as a definition from the
     * internal Hydra vocabulary
     *
     * @return string
     */
    public static function contextId(): string;

    /**
     * Get the class title
     *
     * @return string
     */
    public static function title(): string;
}
