<?php

namespace Arbee\LaravelHydra\Tests\Support;

use Arbee\LaravelHydra\Exceptions\InvalidSupportedClassException;
use Arbee\LaravelHydra\Support\HydraUtils;
use Arbee\LaravelHydra\Tests\Stubs\BasicSupportedClass;
use Arbee\LaravelHydra\Tests\Stubs\InvalidSupportedClass;
use PHPUnit\Framework\TestCase;

class HydraUtilsTest extends TestCase
{
    /** @test */
    public function itCanAssertThatAClassIsAValidSupportedClass()
    {
        HydraUtils::assertValidSupportedClass(BasicSupportedClass::class);
        $this->expectException(InvalidSupportedClassException::class);
        HydraUtils::assertValidSupportedClass(InvalidSupportedClass::class);
    }

    /** @test */
    public function itCanAssertThatAClassIsAValidSupportedClassOrNull()
    {
        HydraUtils::assertValidSupportedClassOrNull(null);
        $this->expectException(InvalidSupportedClassException::class);
        HydraUtils::assertValidSupportedClassOrNull(InvalidSupportedClass::class);
    }
}
