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
     * The URL of the context for this resource
     *
     * @var string
     */
    protected $contextUrl;

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
        if ($class->documents() !== get_class($resource)) {
            throw new MismatchedContextException($class, $resource);
        }
        $this->contextUrl = url(config('hydra.context_base_url')) . '/' . $class->title();
        $this->resource = $resource;
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
                '@context' => $this->contextUrl,
                '@id' => $this->resource->iri(),
                '@type' => $this->resource->type(),
            ],
            $this->resource->jsonLdAttributesToArray()
        ));
    }
}
