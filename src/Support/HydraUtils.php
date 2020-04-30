<?php

namespace Arbee\LaravelHydra\Support;

use Arbee\LaravelHydra\Contracts\HydraClass;
use Arbee\LaravelHydra\Exceptions\InvalidHydraClassException;

class HydraUtils
{
    /**
     * Assert that a class string is a valid Hydra class implementation
     *
     * @param string $class
     */
    public static function assertValidHydraClass(string $class)
    {
        $interfaces = class_implements($class);
        if (!$interfaces || !in_array(HydraClass::class, $interfaces)) {
            throw new InvalidHydraClassException($class);
        }
    }

    /**
     * Assert that a the input is a valid hydra class or null
     *
     * @param string|null $class
     */
    public static function assertValidHydraClassOrNull(?string $class)
    {
        if (is_null($class)) {
            return;
        }
        self::assertValidHydraClass($class);
    }
}
