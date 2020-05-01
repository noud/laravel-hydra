<?php

namespace Arbee\LaravelHydra\Tests\Api;

use Arbee\LaravelHydra\Hydra\SupportedClassCollection;
use Arbee\LaravelHydra\Tests\Stubs\BasicSupportedClass;
use Arbee\LaravelHydra\Tests\TestCase;

class ContextTest extends TestCase
{
    const CONTEXT_BASE_URL = '/context';

    /** @test */
    public function itReturnsSupportedClassContexts()
    {
        $this->app->instance(SupportedClassCollection::class, new SupportedClassCollection([
            $class = new BasicSupportedClass()
        ]));
        $this->getJson(self::CONTEXT_BASE_URL . '/' . $class->title())
            ->assertStatus(200)
            ->assertExactJson(['@vocab' => url(config('hydra.docs_url'))]);
    }

    /** @test */
    public function itReturnsNotFoundResponseIfClassIsNotSupported()
    {
        $this->getJson(self::CONTEXT_BASE_URL . '/not-supported')
            ->assertStatus(404);
    }
}
