<?php

namespace Arbee\LaravelHydra\Serializers;

use Arbee\LaravelHydra\Contracts\HydraClass;
use InvalidArgumentException;

class SupportedClassSerializer
{
    /**
     * Serialize a hydra class into a supported class document array
     *
     * @param string $class
     *
     * @return array
     */
    public static function toArray(string $class): array
    {
        $interfaces = class_implements($class);
        if (!$interfaces || !in_array(HydraClass::class, $interfaces)) {
            throw new InvalidArgumentException(
                "Supported classes must implement \Arbee\LaravelHydra\Contracts\HydraClass"
            );
        }

        $iri = filter_var($class::iri(), FILTER_VALIDATE_URL);
        return [
            '@id' => $iri ?: 'vocab:' . $class::iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => $class::title(),
            'hydra:supportedProperties' => $class::supportedProperties(),
            'hydra:supportedOperations' => $class::supportedOperations(),
        ];
    }
}
