<?php

namespace Arbee\LaravelHydra\Http\Responses;

use Illuminate\Http\JsonResponse;

class JsonLdResponse extends JsonResponse
{
    /**
     * @param mixed   $data
     * @param integer $status
     * @param array   $headers
     * @param integer $options
     */
    public function __construct($data = null, $status = 200, $headers = [], $options = 0)
    {
        $headers = array_merge($headers, ['Content-Type' => 'application/ld+json']);
        parent::__construct($data, $status, $headers, $options);
    }
}
