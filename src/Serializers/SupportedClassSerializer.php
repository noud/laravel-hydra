<?php

namespace Arbee\LaravelHydra\Serializers;

use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Hydra\Vocabulary;

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
        return [
            '@id' => $class->iri(),
            '@type' => Vocabulary::CLASS_CLASS,
            Vocabulary::TITLE => $class->title(),
            Vocabulary::SUPPORTED_PROPERTIES => $class->supportedProperties(),
            Vocabulary::SUPPORTED_OPERATIONS => $class->supportedOperations(),
        ];
    }
}
