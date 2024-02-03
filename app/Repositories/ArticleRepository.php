<?php

declare(strict_types=1);

namespace App\Repositories;



use App\DTO\Articles\CreateArticleDTO;
use App\DTO\Articles\UpdateArticleDTO;
use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use stdClass;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function __construct(
        protected Article $model
    ) {
    }

    public function paginate(int $page = 1, int $totalPerPage = 15)
    {

        return $this->model->paginate($totalPerPage);
    }

    public function getAll(): array
    {
        return $this->model->get()->toArray();
    }

    public function findOne(int $id): Article|null
    {
        return (object) $this->model->find($id);
    }

    public function delete(int $id): void
    {
        $article = $this->model->find($id);
        if (!$article) {
            throw new NotFoundHttpException();
        }
        $article->delete();
    }
    public function new(CreateArticleDTO $dto): Article
    {
        return (object) $this->model->create(
            (array) $dto->toArray()
        );
    }

    public function update(UpdateArticleDTO $dto, int $id): Article|null
    {
        $article = $this->model->find($id);
        if (!$article) {
            throw new NotFoundHttpException();
        }

        $article->fill(
            (array) $dto->toArray()
        );
        $article->save();
        return $article;
    }
}
