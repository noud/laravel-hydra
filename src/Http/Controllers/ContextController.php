<?php

namespace Arbee\LaravelHydra\Http\Controllers;

use Arbee\LaravelHydra\Http\Responses\JsonLdResponse;
use Arbee\LaravelHydra\Hydra\SupportedClassCollection;

class ContextController
{
    /**
     * @var \Arbee\LaravelHydra\Hydra\SupportedClassCollection
     */
    protected $classes;

    /**
     * @param \Arbee\LaravelHydra\Hydra\SupportedClassCollection $classes
     */
    public function __construct(SupportedClassCollection $classes)
    {
        $this->classes = $classes;
    }

    /**
     * Return the context for a supported class
     *
     * @param string $supportedClassTitle
     */
    public function __invoke(string $supportedClassTitle)
    {
        $baseContext = ['@vocab' => url(config('hydra.docs_url'))];
        $class = $this->classes->findByTitleOrFail($supportedClassTitle);
        $properties = $class->supportedProperties()->toContext()->toArray();
        return new JsonLdResponse(array_merge($baseContext, $properties));
    }
}
