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

        $id = filter_var($class::contextId(), FILTER_VALIDATE_URL);
        return [
            '@id' => $id ?: 'vocab:' . $class::contextId(),
            '@type' => 'hydra:Class',
            'hydra:title' => $class::title(),
        ];
    }
}
