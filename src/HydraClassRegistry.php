<?php

namespace Arbee\LaravelHydra;

use Arbee\LaravelHydra\Serializers\SupportedClassSerializer;

class HydraClassRegistry
{
    /**
     * The supported classes
     *
     * @var array
     */
    protected $classes;

    /**
     * Register the supported Hydra classes
     *
     * @param String[] $classes
     */
    public function __construct(array $classes)
    {
        $this->classes = $classes;
    }

    /**
     * Return all registered classes
     */
    public function all(): array
    {
        return $this->classes;
    }

    /**
     * Return all registered classes formatted as JsonLD
     *
     * @return string
     */
    public function toJsonLd(): string
    {
        $classes = array_map(function (string $hydraClass) {
            return SupportedClassSerializer::toArray($hydraClass);
        }, $this->classes);

        return json_encode($classes, JSON_THROW_ON_ERROR);
    }
}
