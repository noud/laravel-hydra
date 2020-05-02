<?php

namespace Arbee\LaravelHydra\Tests\Unit\Http\Resources;

use Arbee\LaravelHydra\Exceptions\MismatchedContextException;
use Arbee\LaravelHydra\Http\Resources\HydraResource;
use Arbee\LaravelHydra\Http\Responses\JsonLdResponse;
use Arbee\LaravelHydra\Tests\Stubs\Documents\BasicSupportedClass;
use Arbee\LaravelHydra\Tests\Stubs\HydraClasses\BasicHydraClass;
use Arbee\LaravelHydra\Tests\Stubs\HydraClasses\OtherHydraClass;
use Arbee\LaravelHydra\Tests\TestCase;
use Illuminate\Http\Request;

class HydraResourceTest extends TestCase
{
    /** @test */
    public function itThrowsAMismatchedContextExceptionWhenTheClassDocDoesNotMatch()
    {
        $this->expectException(MismatchedContextException::class);
        new HydraResource(new BasicSupportedClass(), new OtherHydraClass());
    }

    /** @test */
    public function itReturnsAJsonLdResponse()
    {
        $resource = new HydraResource(new BasicSupportedClass(), new BasicHydraClass());
        $response = $resource->toResponse(new Request());
        $this->assertInstanceOf(JsonLdResponse::class, $response);
    }

    /** @test */
    public function itReturnsTheExpectedContextUrl()
    {
        $resource = new HydraResource($classDoc = new BasicSupportedClass(), new BasicHydraClass());
        $response = json_decode($resource->toResponse(new Request())->getContent(), true);
        $this->assertEquals("http://localhost/context/{$classDoc->title()}", $response['@context']);
    }

    /** @test */
    public function itIncludesTheTransformedResource()
    {
        $resource = new HydraResource(new BasicSupportedClass(), $hydraClass = new BasicHydraClass());
        $response = json_decode($resource->toResponse(new Request())->getContent(), true);
        $this->assertArrayHasKey('@id', $response);
        $this->assertArrayHasKey('@type', $response);
        foreach ($hydraClass->jsonLdAttributesToArray() as $key => $attribute) {
            $this->assertEquals($attribute, $response[$key]);
        }
    }
}
