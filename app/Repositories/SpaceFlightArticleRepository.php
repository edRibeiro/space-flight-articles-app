<?php

namespace App\Repository;

use App\Repositories\Contracts\SpaceFlightArticleRepositoryInterface;
use App\SpaceFlightNews\Contracts\SpaceFlightNewsServiceInterface;

class SpaceFlightArticleRepository implements SpaceFlightArticleRepositoryInterface
{
    public function __construct(
        protected SpaceFlightNewsServiceInterface $repository
    ) {
    }

    public function getAll(array $filter = []): array
    {
        return $this->repository->articles()->get($filter)->toArray();
    }
}
