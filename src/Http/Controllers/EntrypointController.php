<?php

namespace Arbee\LaravelHydra\Http\Controllers;

use Arbee\LaravelHydra\Http\Responses\JsonLdResponse;

class EntrypointController
{
    /**
     * Handle a request to the API entrypoint route
     *
     * @return \Arbee\LaravelHydra\Http\Responses\JsonLdResponse
     */
    public function __invoke(): JsonLdResponse
    {
        return new JsonLdResponse([]);
    }
}
