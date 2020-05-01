<?php

namespace Arbee\LaravelHydra\Tests;

use Arbee\LaravelHydra\Exceptions\InvalidSupportedClassException;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Serializers\SupportedClassSerializer;
use Arbee\LaravelHydra\Tests\Stubs\BasicSupportedClass;
use Arbee\LaravelHydra\Tests\Stubs\InvalidSupportedClass;
use Arbee\LaravelHydra\Tests\Stubs\SchemaSupportedClass;
use PHPUnit\Framework\TestCase;

class SupportedClassSerializerTest extends TestCase
{
    /** @test */
    public function itSerializesClassWithLocalContextId()
    {
        $classDoc = SupportedClassSerializer::toArray(BasicSupportedClass::class);
        $expected = [
            '@id' => 'vocab:' . BasicSupportedClass::iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => BasicSupportedClass::title(),
            'hydra:supportedProperties' => new SupportedPropertyCollection(),
            'hydra:supportedOperations' => new SupportedOperationCollection(),
        ];
        $this->assertEquals($expected, $classDoc);
    }

    /** @test */
    public function itSerializesClassWithRemoteContextId()
    {
        $classDoc = SupportedClassSerializer::toArray(SchemaSupportedClass::class);
        $expected = [
            '@id' => SchemaSupportedClass::iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => SchemaSupportedClass::title(),
            'hydra:supportedProperties' => new SupportedPropertyCollection(),
            'hydra:supportedOperations' => new SupportedOperationCollection(),
        ];
        $this->assertEquals($expected, $classDoc);
    }

    /** @test */
    public function itThrowsAnInvalidArgumentExceptionIfInputDoesNotImplementSupportedClass()
    {
        $this->expectException(InvalidSupportedClassException::class);
        SupportedClassSerializer::toArray(InvalidSupportedClass::class);
    }
}
