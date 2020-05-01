<?php

namespace Arbee\LaravelHydra\Tests;

use Arbee\LaravelHydra\Exceptions\ClassNotSupportedException;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Serializers\SupportedClassSerializer;
use Arbee\LaravelHydra\Tests\Stubs\BasicSupportedClass;
use Arbee\LaravelHydra\Tests\Stubs\InvalidSupportedClass;
use Arbee\LaravelHydra\Tests\Stubs\RemoteIriSupportedClass;
use PHPUnit\Framework\TestCase;

class SupportedClassSerializerTest extends TestCase
{
    /** @test */
    public function itSerializesClassWithLocalContextId()
    {
        $classDoc = SupportedClassSerializer::toArray($class = new BasicSupportedClass());
        $expected = [
            '@id' => 'vocab:' . $class->iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => $class->title(),
            'hydra:supportedProperties' => new SupportedPropertyCollection(),
            'hydra:supportedOperations' => new SupportedOperationCollection(),
        ];
        $this->assertEquals($expected, $classDoc);
    }

    /** @test */
    public function itSerializesClassWithRemoteContextId()
    {
        $classDoc = SupportedClassSerializer::toArray($class = new RemoteIriSupportedClass());
        $expected = [
            '@id' => $class->iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => $class->title(),
            'hydra:supportedProperties' => new SupportedPropertyCollection(),
            'hydra:supportedOperations' => new SupportedOperationCollection(),
        ];
        $this->assertEquals($expected, $classDoc);
    }
}
