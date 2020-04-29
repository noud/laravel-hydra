<?php

namespace Arbee\LaravelHydra\Tests\Stubs;

use Illuminate\Contracts\Support\Jsonable;

class InvalidHydraClass implements Jsonable
{
    public function toJson($options = 0)
    {
        return "";
    }
}
