<?php

use Arbee\LaravelHydra\Http\Controllers\DocsController;

$router = app('router');

$router->get('/docs.jsonld', DocsController::class);
