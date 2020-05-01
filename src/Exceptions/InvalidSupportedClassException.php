<?php

namespace Arbee\LaravelHydra\Exceptions;

use Exception;

class InvalidSupportedClassException extends Exception
{
    public function __construct(string $class)
    {
        parent::__construct("{$class} must implement \Arbee\LaravelHydra\Contracts\SupportedClass");
    }
}
