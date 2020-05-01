<?php

namespace Arbee\LaravelHydra\Http\Controllers;

use Arbee\LaravelHydra\Http\Responses\JsonLdResponse;
use Arbee\LaravelHydra\SupportedClassRegistry;

class DocsController
{
    /**
     * The Hydra class registry
     *
     * @var \Arbee\LaravelHydra\SupportedClassRegistry
     */
    protected $classes;

    /**
     * @param \Arbee\LaravelHydra\SupportedClassRegistry $registry
     */
    public function __construct(SupportedClassRegistry $classes)
    {
        $this->classes = $classes;
    }

    /**
     * Handle a request to the API documentation route
     *
     * @return \Arbee\LaravelHydra\Http\Responses\JsonLdResponse
     */
    public function __invoke(): JsonLdResponse
    {
        return new JsonLdResponse(
            [
                '@context' => [
                    '@vocab' => url()->current(),
                    'hydra' => 'http://www.w3.org/ns/hydra/core#',
                    'rdf' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
                    'rdfs' => 'http://www.w3.org/2000/01/rdf-schema#',
                    'owl' => 'http://www.w3.org/2002/07/owl#',
                ],
                '@id' => url()->current(),
                '@type' => 'hydra:ApiDocumentation',
                'hydra:title' => config('hydra.title'),
                'hydra:description' => config('hydra.description'),
                'hydra:entrypoint' => config('hydra.entrypoint'),
                'hydra:supportedClass' => $this->classes->toJsonLd(),
            ]
        );
    }
}
