<?php

namespace Arbee\LaravelHydra\Tests\Unit\Hydra;

use Arbee\LaravelHydra\Exceptions\InvalidSupportedClassException;
use Arbee\LaravelHydra\Hydra\Operation;
use Arbee\LaravelHydra\Tests\Stubs\BasicSupportedClass;
use Arbee\LaravelHydra\Tests\Stubs\InvalidSupportedClass;
use Arbee\LaravelHydra\Tests\TestCase;
use InvalidArgumentException;

class OperationTest extends TestCase
{
    /** @test */
    public function itCanBeRepresentedAsAnArray()
    {
        $operation = new Operation(
            $method = 'POST',
            $title = 'Create a test object',
            BasicSupportedClass::class,
            BasicSupportedClass::class,
            $statuses = ['422' => 'Validation failed'],
            $expectHeader = 'Bearer',
            $returnHeader = 'Link'
        );
        $asArray = $operation->toArray();
        $expected = [
            '@type' => 'hydra:Operation',
            'hydra:method' => $method,
            'hydra:title' => $title,
            'hydra:expects' => BasicSupportedClass::iri(),
            'hydra:returns' => BasicSupportedClass::iri(),
            'hydra:possibleStatus' => $statuses,
            'hydra:expectsHeader' => $expectHeader,
            'hydra:returnsHeader' => $returnHeader
        ];
        $this->assertEquals($expected, $asArray);
    }

    /** @test */
    public function itOmitsNullOrEmptyValuesFromArrayRepresentation()
    {
        $operation = new Operation(
            $method = 'GET',
            $title = 'Fetch a test object',
            null,
            BasicSupportedClass::class
        );
        $asArray = $operation->toArray();
        $expected = [
            '@type' => 'hydra:Operation',
            'hydra:method' => $method,
            'hydra:title' => $title,
            'hydra:returns' => BasicSupportedClass::iri(),
        ];
        $this->assertEquals($expected, $asArray);
    }

    /** @test */
    public function itThrowsAnInvalidArgumentExceptionIfMethodArgumentIsInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new Operation(
            $method = 'TEST',
            $title = 'Fetch a test object',
            null,
            BasicSupportedClass::class
        );
    }

    /** @test */
    public function itThrowsAnInvalidArgumentExceptionIfExpectsArgumentIsNotValidSupportedClass()
    {
        $this->expectException(InvalidSupportedClassException::class);
        new Operation(
            $method = 'POST',
            $title = 'Create a test object',
            InvalidSupportedClass::class,
            null
        );
    }

    /** @test */
    public function itThrowsAnInvalidArgumentExceptionIfReturnsArgumentIsNotValidSupportedClass()
    {
        $this->expectException(InvalidSupportedClassException::class);
        new Operation(
            $method = 'POST',
            $title = 'Create a test object',
            null,
            InvalidSupportedClass::class
        );
    }
}
