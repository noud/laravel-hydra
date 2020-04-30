<?php

namespace Arbee\LaravelHydra\Tests\Unit\Hydra;

use Arbee\LaravelHydra\Exceptions\InvalidHydraClassException;
use Arbee\LaravelHydra\Hydra\Operation;
use Arbee\LaravelHydra\Tests\Stubs\BasicHydraClass;
use Arbee\LaravelHydra\Tests\Stubs\InvalidHydraClass;
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
            BasicHydraClass::class,
            BasicHydraClass::class,
            $statuses = ['422' => 'Validation failed'],
            $expectHeader = 'Bearer',
            $returnHeader = 'Link'
        );
        $asArray = $operation->toArray();
        $expected = [
            '@type' => 'hydra:Operation',
            'hydra:method' => $method,
            'hydra:title' => $title,
            'hydra:expects' => BasicHydraClass::iri(),
            'hydra:returns' => BasicHydraClass::iri(),
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
            BasicHydraClass::class
        );
        $asArray = $operation->toArray();
        $expected = [
            '@type' => 'hydra:Operation',
            'hydra:method' => $method,
            'hydra:title' => $title,
            'hydra:returns' => BasicHydraClass::iri(),
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
            BasicHydraClass::class
        );
    }

    /** @test */
    public function itThrowsAnInvalidArgumentExceptionIfExpectsArgumentIsNotValidHydraClass()
    {
        $this->expectException(InvalidHydraClassException::class);
        new Operation(
            $method = 'POST',
            $title = 'Create a test object',
            InvalidHydraClass::class,
            null
        );
    }

    /** @test */
    public function itThrowsAnInvalidArgumentExceptionIfReturnsArgumentIsNotValidHydraClass()
    {
        $this->expectException(InvalidHydraClassException::class);
        new Operation(
            $method = 'POST',
            $title = 'Create a test object',
            null,
            InvalidHydraClass::class
        );
    }
}
