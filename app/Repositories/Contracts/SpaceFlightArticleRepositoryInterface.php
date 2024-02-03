<?php

namespace App\Repositories\Contracts;

interface SpaceFlightArticleRepositoryInterface
{
    /**
     * @return stdClass[]
     */
    public function getAll(array $filter = []): array;
}
