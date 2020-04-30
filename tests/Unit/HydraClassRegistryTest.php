<?php

namespace Arbee\LaravelHydra\Tests\Unit;

use Arbee\LaravelHydra\HydraClassRegistry;
use Arbee\LaravelHydra\Hydra\SupportedPropertyCollection;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use Arbee\LaravelHydra\Tests\Stubs\BasicHydraClass;
use PHPUnit\Framework\TestCase;

class HydraClassRegistryTest extends TestCase
{
    /** @test */
    public function itProvidesJsonLdRepresentationOfClasses()
    {
        $classes = [BasicHydraClass::class, BasicHydraClass::class];
        $registry = new HydraClassRegistry($classes);
        $jsonLd = $registry->toJsonLd();

        $this->assertJson($jsonLd);
        $basicOutput = [
            '@id' => 'vocab:' . BasicHydraClass::iri(),
            '@type' => 'hydra:Class',
            'hydra:title' => BasicHydraClass::title(),
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
