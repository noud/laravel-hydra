<?php

namespace Arbee\LaravelHydra\Tests\Api;

use Arbee\LaravelHydra\Tests\TestCase;

class DocsTest extends TestCase
{
    const DOCS_URI = '/docs.jsonld';

    /** @test */
    public function itReturnsJsonLdContentTypeHeader()
    {
        $this->getJson(self::DOCS_URI)
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/ld+json');
    }

    /** @test */
    public function itReturnsLinkedData()
    {
        $this->getJson(self::DOCS_URI)
            ->assertStatus(200)
            ->assertJsonStructure(['@context', '@id', '@type']);
    }

    /** @test */
    public function itHasTypeApiDocumentation()
    {
        $this->getJson(self::DOCS_URI)
            ->assertStatus(200)
            ->assertJsonFragment(['@type' => 'hydra:ApiDocumentation']);
    }

    /** @test */
    public function itIncludesHydraApiDocumentationProperties()
    {
        $this->getJson(self::DOCS_URI)
            ->assertStatus(200)
            ->assertJsonStructure(['hydra:title', 'hydra:description', 'hydra:supportedClass', 'hydra:entrypoint']);
    }
}
