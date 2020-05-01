<?php

use Arbee\LaravelHydra\Http\Controllers\ContextController;
use Arbee\LaravelHydra\Http\Controllers\DocsController;
use Illuminate\Routing\Router;

$router = app('router');

$router->prefix(config('hydra.base_url'))->group(function (Router $router) {
    $router->get(config('hydra.docs_url'), DocsController::class);
    $router->get(config('hydra.context_base_url') . '/{supportedClassTitle}', ContextController::class);
});
