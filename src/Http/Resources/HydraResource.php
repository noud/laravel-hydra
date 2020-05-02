<?php

namespace Arbee\LaravelHydra\Http\Resources;

use Illuminate\Contracts\Support\Responsable;
use Arbee\LaravelHydra\Contracts\JsonLdable;
use Arbee\LaravelHydra\Contracts\SupportedClass;
use Arbee\LaravelHydra\Exceptions\MismatchedContextException;
use Arbee\LaravelHydra\Http\Responses\JsonLdResponse;

class HydraResource implements Responsable
{
    /**
     * @var \Arbee\LaravelHydra\Contracts\SupportedClass
     */
    protected $classDoc;

    /**
     * @var \Arbee\LaravelHydra\Contracts\JsonLdable
     */
    protected $resource;

    /**
     * @param \Arbee\LaravelHydra\Contracts\SupportedClass $class
     * @param \Arbee\LaravelHydra\Contracts\JsonLdable $resource
     */
    public function __construct(SupportedClass $class, JsonLdable $resource)
    {
        $this->classDoc = $class;
        $this->resource = $resource;
    }

    private function getContextUrl(): string
    {
        return url(config('hydra.context_base_url')) . '/' . $this->class->title();
    }

    /**
     * Transform the resource into an HTTP response
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return new JsonLdResponse(array_merge(
            [
                '@context' => $this->getContextUrl(),
                '@id' => $this->resource->iri(),
                '@type' => $this->resource->ldType(),
            ],
            $this->classDoc->supportedPropertyValues($this->resource)
        ));
    }
}
