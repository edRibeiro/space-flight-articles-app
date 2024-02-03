<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repositories\Contracts\SpaceFlightArticleRepositoryInterface;
use App\SpaceFlightNews\SpaceFlightNewsService;

class SpaceFlightArticleRepository implements SpaceFlightArticleRepositoryInterface
{
    public function __construct(
        protected SpaceFlightNewsService $repository
    ) {
    }

    public function getAll(array $filter = []): array
    {
        return $this->repository->articles()->get($filter)->toArray();
    }
}
