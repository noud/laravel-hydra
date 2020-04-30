<?php

namespace Arbee\LaravelHydra\Tests\Support;

use Arbee\LaravelHydra\Exceptions\InvalidHydraClassException;
use Arbee\LaravelHydra\Support\HydraUtils;
use Arbee\LaravelHydra\Tests\Stubs\BasicHydraClass;
use Arbee\LaravelHydra\Tests\Stubs\InvalidHydraClass;
use PHPUnit\Framework\TestCase;

class HydraUtilsTest extends TestCase
{
    /** @test */
    public function itCanAssertThatAClassIsAValidHydraClass()
    {
        HydraUtils::assertValidHydraClass(BasicHydraClass::class);
        $this->expectException(InvalidHydraClassException::class);
        HydraUtils::assertValidHydraClass(InvalidHydraClass::class);
    }

    /** @test */
    public function itCanAssertThatAClassIsAValidHydraClassOrNull()
    {
        HydraUtils::assertValidHydraClassOrNull(null);
        $this->expectException(InvalidHydraClassException::class);
        HydraUtils::assertValidHydraClassOrNull(InvalidHydraClass::class);
    }
}
