<?php

namespace Arbee\LaravelHydra\Tests\Unit\Hydra;

use Arbee\LaravelHydra\Hydra\Property;
use Arbee\LaravelHydra\Hydra\SupportedProperty;
use PHPUnit\Framework\TestCase;

class SupportedPropertyTest extends TestCase
{
    /** @test */
    public function itCanBeRepresentedAsAnArray()
    {
        $supportedProperty = new SupportedProperty($property = new Property('property'), $title = 'Test');
        $asArray = $supportedProperty->toArray();
        $expected = [
            '@type' => 'hydra:SupportedProperty',
            'hydra:title' => $title,
            'hydra:property' => $property->toArray(),
            'owl:deprecated' => false,
            'hydra:required' => false,
            'hydra:readable' => true,
            'hydra:writable' => true,
        ];
        $this->assertEquals($expected, $asArray);
    }

    /** @test */
    public function itCanBeMarkedAsRequired()
    {
        $supportedProperty = new SupportedProperty(new Property('property'), 'Test');
        $original = $supportedProperty->toArray();
        $this->assertFalse($original['hydra:required']);

        $supportedProperty->required();
        $required = $supportedProperty->toArray();
        $this->assertTrue($required['hydra:required']);
    }

    /** @test */
    public function itCanBeMarkedAsDeprecated()
    {
        $supportedProperty = new SupportedProperty(new Property('property'), 'Test');
        $original = $supportedProperty->toArray();
        $this->assertFalse($original['owl:deprecated']);

        $supportedProperty->deprecated();
        $required = $supportedProperty->toArray();
        $this->assertTrue($required['owl:deprecated']);
    }

    /** @test */
    public function itCanBeMarkedAsReadOnly()
    {
        $supportedProperty = new SupportedProperty(new Property('property'), 'Test');
        $original = $supportedProperty->toArray();
        $this->assertTrue($original['hydra:writable']);

        $supportedProperty->readOnly();
        $required = $supportedProperty->toArray();
        $this->assertFalse($required['hydra:writable']);
    }

    /** @test */
    public function itCanBeMarkedAsWriteOnly()
    {
        $supportedProperty = new SupportedProperty(new Property('property'), 'Test');
        $original = $supportedProperty->toArray();
        $this->assertTrue($original['hydra:readable']);

        $supportedProperty->writeOnly();
        $required = $supportedProperty->toArray();
        $this->assertFalse($required['hydra:readable']);
    }
}
