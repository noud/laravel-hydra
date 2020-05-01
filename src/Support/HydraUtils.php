<?php

namespace Arbee\LaravelHydra\Support;

use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Exceptions\InvalidSupportedClassException;

class HydraUtils
{
    /**
     * Assert that a class string is a valid Hydra class implementation
     *
     * @param string $class
     */
    public static function assertValidSupportedClass(string $class)
    {
        $interfaces = class_implements($class);
        if (!$interfaces || !in_array(SupportedClass::class, $interfaces)) {
            throw new InvalidSupportedClassException($class);
        }
    }

    /**
     * Assert that a the input is a valid hydra class or null
     *
     * @param string|null $class
     */
    public static function assertValidSupportedClassOrNull(?string $class)
    {
        if (is_null($class)) {
            return;
        }
        self::assertValidSupportedClass($class);
    }

    /**
     * Check if an IRI is a compact IRI according to the JsonLD spec
     *
     * @param string $iri
     *
     * @return boolean
     */
    public static function isCompactIri(string $iri): bool
    {
        $separatorPos = strpos($iri, ':');
        return $separatorPos && !substr($iri, $separatorPos, 2) == '//';
    }
}
