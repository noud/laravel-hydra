<?php

namespace Arbee\LaravelHydra\Tests\Unit;

use Arbee\LaravelHydra\SupportedClassRegistry;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use Arbee\LaravelHydra\Tests\Stubs\BasicSupportedClass;
use PHPUnit\Framework\TestCase;

class SupportedClassRegistryTest extends TestCase
{
    /** @test */
    public function itProvidesJsonLdRepresentationOfClasses()
    {
        $classes = [BasicSupportedClass::class, BasicSupportedClass::class];
        $registry = new SupportedClassRegistry($classes);
        $jsonLd = $registry->toJsonLd();

        $this->assertJson($jsonLd);
        $basicOutput = [
            '@id' => 'vocab:' . BasicSupportedClass::iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => BasicSupportedClass::title(),
            'hydra:supportedProperties' => new SupportedPropertyCollection(),
            'hydra:supportedOperations' => new SupportedOperationCollection(),
        ];
        $expected = json_encode([
            $basicOutput,
            $basicOutput
        ]);
        $this->assertJsonStringEqualsJsonString($expected, $jsonLd);
    }
}
