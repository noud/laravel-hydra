<?php

namespace Arbee\LaravelHydra\Tests\Unit\Hydra;

use Arbee\LaravelHydra\Hydra\LinkProperty;
use Arbee\LaravelHydra\Hydra\SupportedOperationCollection;
use PHPUnit\Framework\TestCase;

class LinkPropertyTest extends TestCase
{
    /** @test */
    public function itCanBeRepresentedAsAnArray()
    {
        $linkProperty = new LinkProperty($iri = '/test', new SupportedOperationCollection());
        $asArray = $linkProperty->toArray();
        $this->assertEquals($iri, $asArray['@id']);
        $this->assertEquals('hydra:Link', $asArray['@type']);
        $this->assertArrayHasKey('hydra:supportedOperations', $asArray);
    }
}
