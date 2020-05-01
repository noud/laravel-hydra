<?php

namespace Arbee\LaravelHydra\Serializers;

use Arbee\LaravelHydra\Contracts\SupportedClass;

class SupportedClassSerializer
{
    /**
     * Serialize a hydra class into a supported class document array
     *
     * @param \Arbee\LaravelHydra\Contracts\SupportedClass $class
     *
     * @return array
     */
    public static function toArray(SupportedClass $class): array
    {
        $iri = filter_var($class->iri(), FILTER_VALIDATE_URL);
        return [
            '@id' => $iri ?: 'vocab:' . $class->iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => $class->title(),
            'hydra:supportedProperties' => $class->supportedProperties(),
            'hydra:supportedOperations' => $class->supportedOperations(),
        ];
    }
}
