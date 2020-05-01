<?php

namespace Arbee\LaravelHydra\Http\Controllers;

use Arbee\LaravelHydra\Http\Responses\JsonLdResponse;
use Arbee\LaravelHydra\Hydra\SupportedClassCollection;
use Arbee\LaravelHydra\Hydra\Vocabulary;

class DocsController
{
    /**
     * The Hydra class registry
     *
     * @var \Arbee\LaravelHydra\Hydra\SupportedClassCollection
     */
    protected $classes;

    /**
     * @param \Arbee\LaravelHydra\Hydra\SupportedClassCollection $registry
     */
    public function __construct(SupportedClassCollection $classes)
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
                    '@vocab' => url(config('hydra.docs_url')),
                    'hydra' => 'http://www.w3.org/ns/hydra/core#',
                    'rdf' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
                ],
                '@id' => url(config('hydra.docs_url')),
                '@type' => 'hydra:ApiDocumentation',
                Vocabulary::TITLE => config('hydra.title'),
                Vocabulary::DESCRIPTION => config('hydra.description'),
                'hydra:entrypoint' => config('hydra.entrypoint'),
                'hydra:supportedClass' => $this->classes->toJsonLd(),
            ]
        );
    }
}
