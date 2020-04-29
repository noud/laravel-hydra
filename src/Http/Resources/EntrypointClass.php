<?php

namespace Arbee\LaravelHydra\Http\Resources;

use Arbee\LaravelHydra\Contracts\HydraClass;

class EntrypointClass implements HydraClass
{
    /**
     * Get the identifier for this class. If this is not a URL, it will be treated as a definition from the
     * internal Hydra vocabulary
     *
     * @return string
     */
    public static function contextId(): string
    {
        return 'Entrypoint';
    }

    /**
     * Get the class title
     *
     * @return string
     */
    public static function title(): string
    {
        return 'Entrypoint';
    }
}
