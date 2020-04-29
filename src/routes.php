<?php

use Arbee\LaravelHydra\Http\Controllers\DocsController;
use Arbee\LaravelHydra\Http\Controllers\EntrypointController;
use Illuminate\Routing\Router;

$router = app('router');

$router->prefix(config('hydra.base_url'))->group(function (Router $router) {
    $router->get('/docs.jsonld', DocsController::class);
    $router->get('/index.jsonld', EntrypointController::class);
});
