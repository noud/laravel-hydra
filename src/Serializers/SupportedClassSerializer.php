<?php

namespace Arbee\LaravelHydra\Serializers;

use Arbee\LaravelHydra\Support\HydraUtils;

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
        HydraUtils::assertValidSupportedClass($class);

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
