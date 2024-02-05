<?php

namespace App\Services\Contracts;

interface SpaceFlightArticleServiceInterface
{
    public function getAll(array $filter = []): array;
}
