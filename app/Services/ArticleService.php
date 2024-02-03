<?php

namespace App\Services;

use App\DTO\Articles\CreateArticleDTO;
use App\DTO\Articles\UpdateArticleDTO;
use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Services\Contracts\ArticleServiceInterface;


class ArticleService implements ArticleServiceInterface
{
    public function __construct(
        protected ArticleRepositoryInterface $repository,
    ) {
    }

    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    public function findOne(int $id): Article|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateArticleDTO $dto): Article
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateArticleDTO $dto, int $id): Article|null
    {
        return $this->repository->update($dto, $id);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }

    public function paginate(
        int $page = 1,
        int $totalPerPage = 15
    ) {

        return $this->repository->paginate($page, $totalPerPage);
    }
}
