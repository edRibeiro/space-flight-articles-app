<?php

namespace App\Services\Contracts;

use App\DTO\Articles\CreateArticleDTO;
use App\DTO\Articles\UpdateArticleDTO;
use App\Models\Article;

interface ArticleServiceInterface
{
    public function getAll(): array;
    public function findOne(int $id): Article|null;
    public function new(CreateArticleDTO $dto): Article;
    public function update(UpdateArticleDTO $dto, int $id): Article|null;
    public function delete(int $id): void;
    public function paginate(
        int $page = 1,
        int $totalPerPage = 15
    );
    public function updateOrInsert(CreateArticleDTO $dto): Article|null;
    public function count(): int;
    public function getMaxSpaceflightId(): int;
}
