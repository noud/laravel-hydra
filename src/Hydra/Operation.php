<?php

namespace Arbee\LaravelHydra\Hydra;

use InvalidArgumentException;

class Operation
{
    /**
     * The HTTP method for the operation
     *
     * @var string
     */
    protected $method;

    /**
     * The operation title
     *
     * @var string
     */
    protected $title;

    /**
     * The iri of the input type for the operation
     *
     * @var string | null
     */
    protected $expects;

    /**
     * The iri of the return type of the operation
     *
     * @var string | null
     */
    protected $returns;

    /**
     * An array of statuses the operation could possibly return
     *
     * @var array
     */
    protected $statuses;

    /**
     * The expected HTTP header that should be sent with the operation request
     *
     * @var string
     */
    protected $expectsHeader;

    /**
     * The HTTP header that will be returned with the response
     *
     * @var string
     */
    protected $returnsHeader;

    /**
     * The operation type
     *
     * @var string
     */
    protected $type = 'hydra:Operation';

    /**
     * @param string $method
     * @param string $title
     * @param string|null $expects
     * @param string|null $returns
     * @param array $statuses
     * @param string $expectsHeaders
     * @param string $returnsHeaders
     *
     * @todo Validate that expects and return match an IRI from a supported class?
     */
    public function __construct(
        string $method,
        string $title,
        ?string $expects = null,
        ?string $returns = null,
        array $statuses = [],
        ?string $expectsHeader = null,
        ?string $returnsHeader = null
    ) {
        if (!$this->isValidRequestMethod($method)) {
            throw new InvalidArgumentException('Operation method is not valid');
        }

        $this->method = $method;
        $this->title = $title;
        $this->expects = $expects;
        $this->returns = $returns;
        $this->statuses = $statuses;
        $this->expectsHeader = $expectsHeader;
        $this->returnsHeader = $returnsHeader;
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
            'hydra:method' => strtoupper($this->method),
            'hydra:title' => $this->title,
            'hydra:expects' => $this->expects,
            'hydra:returns' => $this->returns,
            'hydra:possibleStatus' => $this->statuses,
            'hydra:expectsHeader' => $this->expectsHeader,
            'hydra:returnsHeader' => $this->returnsHeader,
        ];

        // Filter out keys for which no values have been set
        return array_filter($operation, function ($value) {
            return !(is_null($value) || empty($value));
        });
    }

    /**
     * Check if the operation method is valid
     *
     * @param string $method
     *
     * @return boolean
     */
    protected function isValidRequestMethod(string $method): bool
    {
        return in_array(strtoupper($method), ['DELETE', 'GET', 'HEAD', 'OPTIONS', 'PATCH', 'POST', 'PUT']);
    }
}
