<?php

namespace Arbee\LaravelHydra\Tests\Unit\Hydra;

use Arbee\LaravelHydra\Hydra\Operation;
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
            $expects = 'ExpectsIRI',
            $returns = 'ReturnsIRI',
            $statuses = ['422' => 'Validation failed'],
            $expectHeader = 'Bearer',
            $returnHeader = 'Link'
        );
        $asArray = $operation->toArray();
        $expected = [
            '@type' => 'hydra:Operation',
            'hydra:method' => $method,
            'hydra:title' => $title,
            'hydra:expects' => $expects,
            'hydra:returns' => $returns,
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
            $returns = 'ReturnsIRI'
        );
        $asArray = $operation->toArray();
        $expected = [
            '@type' => 'hydra:Operation',
            'hydra:method' => $method,
            'hydra:title' => $title,
            'hydra:returns' => $returns,
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
            'ReturnsIRI'
        );
    }
}
