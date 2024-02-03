<?php

namespace App\Services;

use App\Services\Contracts\SpaceFlightArticleServiceInterface;
use App\Repositories\Contracts\SpaceFlightArticleRepositoryInterface;

class SpaceFlightArticleService implements SpaceFlightArticleServiceInterface
{
    public function __construct(
        protected SpaceFlightArticleRepositoryInterface $repository,
    ) {
    }

    public function getAll(array $filter = []): array
    {
        return $this->repository->getAll($filter);
    }
}
