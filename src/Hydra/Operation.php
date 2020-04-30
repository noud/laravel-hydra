<?php

namespace Arbee\LaravelHydra\Hydra;

class Operation
{
    protected $method;

    protected $title;

    protected $expects;

    protected $returns;

    protected $statuses;

    protected $expectsHeaders;

    protected $returnsHeaders;

    protected $type = 'hydra:Operation';

    /**
     * @param string $method
     * @param string $title
     * @param string|null $expects
     * @param string|null $returns
     * @param array $statuses
     * @param array $expectsHeaders
     * @param array $returnsHeaders
     *
     * @todo Validate arguments?
     */
    public function __construct(
        string $method,
        string $title,
        ?string $expects = null,
        ?string $returns = null,
        array $statuses = [],
        array $expectsHeaders = [],
        array $returnsHeaders = []
    ) {
        $this->method = $method;
        $this->title = $title;
        $this->expects = $expects;
        $this->returns = $returns;
        $this->statuses = $statuses;
        $this->expectsHeaders = $expectsHeaders;
        $this->returnsHeaders = $returnsHeaders;
    }

    /**
     * Return an array representation of the operation
     *
     * @return array
     */
    public function toArray(): array
    {
        $operation = [
            '@type' => $this->type,
            'hydra:method' => $this->method,
            'hydra:title' => $this->title,
            'hydra:expects' => $this->expects,
            'hydra:returns' => $this->returns,
            'hydra:possibleStatus' => $this->statuses,
            'hydra:expectsHeader' => $this->expectsHeaders,
            'hydra:returnsHeader' => $this->returnsHeaders,
        ];

        // Filter out keys for which no values have been set
        return array_filter($operation, function ($value) {
            return !(is_null($value) || empty($value));
        });
    }
}
