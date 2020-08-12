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
        $docsUrl = url(config('hydra.docs_url'));
        $headers = array_merge(
            $headers,
            [
                'Content-Type' => 'application/ld+json',
                'Link' => "<${docsUrl}>; rel=\"http://www.w3.org/ns/hydra/core#apiDocumentation\""
            ]
        );
        parent::__construct($data, $status, $headers, $options);
    }
}
