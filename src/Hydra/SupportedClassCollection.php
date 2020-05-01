<?php

namespace Arbee\LaravelHydra\Hydra;

use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Exceptions\ClassNotSupportedException;
use Arbee\LaravelHydra\Serializers\SupportedClassSerializer;
use Illuminate\Support\Collection;

class SupportedClassCollection extends Collection
{
    /**
     * Find the class by title or fail
     *
     * @param string $title
     *
     * @return \Arbee\LaravelHydra\Contracts\SupportedClass
     */
    public function findByTitleOrFail(string $title): SupportedClass
    {
        $key = $this->search(function ($class) use ($title) {
            return $title === $class->title();
        });

        if ($key === false) {
            throw new ClassNotSupportedException($title);
        }

        return $this->get($key);
    }

    /**
     * Convert the collection to JsonLD
     *
     * @return string
     */
    public function toJsonLd(): string
    {
        return $this->map(function (SupportedClass $class) {
            return SupportedClassSerializer::toArray($class);
        })->toJson();
    }
}
