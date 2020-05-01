<?php

namespace Arbee\LaravelHydra\Exceptions;

use Arbee\LaravelHydra\Http\Controllers\DocsController;
use Arbee\LaravelHydra\Http\Responses\JsonLdResponse;
use ErrorException;
use Illuminate\Contracts\Support\Responsable;

class ClassNotSupportedException extends ErrorException implements Responsable
{
    /**
     * @param string $classTitle
     */
    public function __construct(string $classTitle)
    {
        parent::__construct("The class {$classTitle} is not supported by the API");
    }

    /**
     * Transform the exception into an HTTP response
     */
    public function toResponse($request)
    {
        return new JsonLdResponse([
            '@context' => url(config('hydra.docs_url')),
            '@type' => 'hydra:Error',
            'hydra:statusCode' => 404,
            'hydra:title' => 'Not found',
            'hydra:description' => 'The specified class is not supported by the API',
        ], 404);
    }
}
