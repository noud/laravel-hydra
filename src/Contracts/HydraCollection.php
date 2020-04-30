<?php

namespace Arbee\LaravelHydra\Contracts;

interface HydraCollection
{
    public function id(): string;

    public function title(): string;

    public function members(): array;

    public function count(): int;

    public function paginator(): HydraPaginator;

    public function searchTemplate(): HydraSearchTemplate;
}
