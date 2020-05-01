<?php

namespace Arbee\LaravelHydra\Tests\Unit\Http\Responses;

use Arbee\LaravelHydra\Http\Responses\JsonLdResponse;
use Arbee\LaravelHydra\Tests\TestCase;

class JsonLdResponseTest extends TestCase
{
    /** @test */
    public function itSetsContentTypeHeader()
    {
        $response = new JsonLdResponse();
        $this->assertTrue($response->headers->get('Content-Type') == 'application/ld+json');
    }

    /** @test */
    public function itSetsLinkHeader()
    {
        $response = new JsonLdResponse();
        $link = '<http://localhost/docs>rel="http://www.w3.org/ns/hydra/core#apiDocumentation"';
        $this->assertTrue($response->headers->get('Link') == $link);
    }
}
