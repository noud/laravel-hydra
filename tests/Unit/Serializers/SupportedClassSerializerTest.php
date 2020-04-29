<?php

namespace Arbee\LaravelHydra\Tests;

use Arbee\LaravelHydra\Serializers\SupportedClassSerializer;
use Arbee\LaravelHydra\Tests\Stubs\BasicHydraClass;
use Arbee\LaravelHydra\Tests\Stubs\InvalidHydraClass;
use Arbee\LaravelHydra\Tests\Stubs\SchemaHydraClass;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SupportedClassSerializerTest extends TestCase
{
    /** @test */
    public function itSerializesClassWithLocalContextId()
    {
        $classDoc = SupportedClassSerializer::toArray(BasicHydraClass::class);
        $expected = [
            '@id' => 'vocab:' . BasicHydraClass::contextId(),
            '@type' => 'hydra:Class',
            'hydra:title' => BasicHydraClass::title(),
        ];
        $this->assertEquals($expected, $classDoc);
    }

    /** @test */
    public function itSerializesClassWithRemoteContextId()
    {
        $classDoc = SupportedClassSerializer::toArray(SchemaHydraClass::class);
        $expected = [
            '@id' => SchemaHydraClass::contextId(),
            '@type' => 'hydra:Class',
            'hydra:title' => SchemaHydraClass::title(),
        ];
        $this->assertEquals($expected, $classDoc);
    }

    /** @test */
    public function itThrowsAnInvalidArgumentExceptionIfInputDoesNotImplementHydraClass()
    {
        $this->expectException(InvalidArgumentException::class);
        SupportedClassSerializer::toArray(InvalidHydraClass::class);
    }
}
