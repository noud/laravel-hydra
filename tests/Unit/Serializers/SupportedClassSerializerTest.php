<?php

namespace Arbee\LaravelHydra\Tests;

use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
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
            '@id' => 'vocab:' . BasicHydraClass::iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => BasicHydraClass::title(),
            'hydra:supportedProperties' => new SupportedPropertyCollection(),
            'hydra:supportedOperations' => new SupportedOperationCollection(),
        ];
        $this->assertEquals($expected, $classDoc);
    }

    /** @test */
    public function itSerializesClassWithRemoteContextId()
    {
        $classDoc = SupportedClassSerializer::toArray(SchemaHydraClass::class);
        $expected = [
            '@id' => SchemaHydraClass::iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => SchemaHydraClass::title(),
            'hydra:supportedProperties' => new SupportedPropertyCollection(),
            'hydra:supportedOperations' => new SupportedOperationCollection(),
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
