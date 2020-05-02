<?php

namespace Arbee\LaravelHydra\Tests\Unit\Hydra;

use Arbee\LaravelHydra\Exceptions\ClassNotSupportedException;
use Arbee\LaravelHydra\Hydra\SupportedClassCollection;
use Arbee\LaravelHydra\Tests\Stubs\Documents\BasicSupportedClass;
use PHPUnit\Framework\TestCase;

class SupportedClassCollectionTest extends TestCase
{
    /** @test */
    public function itCanFindClassByTitle()
    {
        $collection = new SupportedClassCollection([
            $class = new BasicSupportedClass()
        ]);
        $result = $collection->findByTitleOrFail($class->title());
        $this->assertEquals($class, $result);
    }

    /** @test */
    public function itThrowsClassNotSupportedExceptionIfItCannotFindClassByTitle()
    {
        $this->expectException(ClassNotSupportedException::class);
        $collection = new SupportedClassCollection();
        $collection->findByTitleOrFail('Not found');
    }
}
