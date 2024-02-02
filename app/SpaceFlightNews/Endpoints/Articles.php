<?php

namespace App\SpaceFlightNews\Endpoints;

use App\SpaceFlightNews\Endpoints\BaseEndpoint;
use App\SpaceFlightNews\Entities\Article;
use Illuminate\Support\Collection;

class Articles extends BaseEndpoint
{

    public function get(): Collection
    {
        return $this->transform(
            $this->service->api->get('/v4/articles/?limit=10000')->json('results'),
            Article::class
        );
    }
}
