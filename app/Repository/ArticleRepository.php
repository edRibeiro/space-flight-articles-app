<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Article;

class ArticleRepository extends AbstractRepository
{
    protected static $model = Article::class;
}
