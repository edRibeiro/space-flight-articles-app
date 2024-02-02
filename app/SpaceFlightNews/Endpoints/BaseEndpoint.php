<?php

namespace App\SpaceFlightNews\Endpoints;

use App\SpaceFlightNews\SpaceFlightNewsApi;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected SpaceFlightNewsApi $service;

    public function __construct()
    {
        $this->service = new SpaceFlightNewsApi();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)
            ->map(fn ($data) => new $entity($data));
    }
}
