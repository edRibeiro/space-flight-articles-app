<?php

namespace App\SpaceFlightNews\Endpoints;

use App\Services\SpaceFlightNews\SpaceFlightNewsService;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected SpaceFlightNewsService $service;

    public function __construct()
    {
        $this->service = new SpaceFlightNewsService();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)
            ->map(fn ($data) => new $entity($data));
    }
}
