<?php

namespace App\Repositories\Contracts;

use App\DTO\Articles\CreateArticleDTO;
use App\DTO\Articles\UpdateArticleDTO;
use App\Models\Article;
use stdClass;

interface ArticleRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15);
    public function getAll(): array;
    public function findOne(int $id): Article|null;
    public function delete(int $id): void;
    public function new(CreateArticleDTO $dto): Article;
    public function update(UpdateArticleDTO $dto, int $id): Article|null;
    public function updateOrInsert(CreateArticleDTO $dto): Article|null;
    public function count(): int;
    public function getMaxSpaceflightId(): int;
}
