<?php

namespace Arbee\LaravelHydra\Exceptions;

use Arbee\LaravelHydra\Contracts\JsonLdable;
use Arbee\LaravelHydra\Contracts\SupportedClass;
use LogicException;

class MismatchedContextException extends LogicException
{
    /**
     * @param \Arbee\LaravelHydra\Contracts\SupportedClass $classDoc
     * @param \Arbee\LaravelHydra\Contracts\JsonLdable $instance
     */
    public function __construct(SupportedClass $classDoc, JsonLdable $instance)
    {
        $class = get_class($instance);
        $docClass = get_class($classDoc);
        $documents = $classDoc->documents();
        parent::__construct("{$class} is not documented {$docClass}. Was expecting an instance of {$documents}");
    }
}
