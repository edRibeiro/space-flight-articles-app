<?php

namespace App\SpaceFlightNews\Endpoints;

use App\SpaceFlightNews\Endpoints\BaseEndpoint;
use App\SpaceFlightNews\Entities\Article;
use Illuminate\Support\Collection;

class Articles extends BaseEndpoint
{

    public function get(array $atributes = []): Collection
    {
        $queryString = http_build_query(array_merge($atributes, ['limit' => 10000]));
        return $this->transform(
            $this->service->api->get('/v4/articles?' . $queryString)->json('results'),
            Article::class
        );
    }
}
