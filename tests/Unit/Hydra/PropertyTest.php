<?php

namespace Arbee\LaravelHydra\Tests\Unit\Hydra;

use Arbee\LaravelHydra\Hydra\Property;
use PHPUnit\Framework\TestCase;

class PropertyTest extends TestCase
{
    /** @test */
    public function itCanBeRepresentedAsAnArray()
    {
        $property = new Property($iri = 'Test');
        $asArray = $property->toArray();
        $this->assertEquals([
            '@id' => $iri,
            '@type' => 'rdf:Property',
        ], $asArray);
    }
}
