<?php

/**
 * Configuration for the Laravel Hydra package
 */

return [
    'title' => env('HYDRA_API_NAME', 'Laravel Hydra API'),
    'description' => env('HYDRA_API_DESCRIPTION', 'An API that conforms to the Hydra specification'),
    'base_url' => env('HYDRA_BASE_URL', '/'),
    'docs_url' => env('HYDRA_DOCS_URL', '/docs'),
    'context_base_url' => env('HYDRA_CONTEXT_BASE_URL')
];
