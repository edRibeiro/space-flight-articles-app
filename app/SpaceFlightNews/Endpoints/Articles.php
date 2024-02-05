<?php

namespace App\SpaceFlightNews\Endpoints;

use App\SpaceFlightNews\Endpoints\BaseEndpoint;
use App\SpaceFlightNews\Entities\Article;
use Illuminate\Support\Collection;

class Articles extends BaseEndpoint
{
    private $path = '/v4/articles';

    public function get(array $filters = []): Collection
    {
        $query = ['limit' => 500];
        $query = array_merge($filters, $query);
        return $this->transform(
            $this->service->api->get($this->path, $query)->json('results'),
            Article::class
        );
    }

    public function getAll(array $filters = []): Collection
    {
        $results = collect();
        $query = ['limit' => 500];
        $query = array_merge($filters, $query);
        do {
            $response = $this->service->api->get($this->path, $query);
            $results = $results->merge(
                $this->transform(
                    $response->json('results'),
                    Article::class
                )->toArray()
            );
            $query = [];
            $urlNext = $response->json('next');
            if (!isset($urlNext)) {
                break;
            }

            $urlComponents = parse_url($urlNext);

            if (isset($urlComponents['query'])) {
                parse_str($urlComponents['query'], $queryParams);
                $query = $queryParams;
            } else {
                break;
            }
        } while (true);
        return $results;
    }
}
