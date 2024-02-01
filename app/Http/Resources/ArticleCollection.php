<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'data' => $this->collection->transform(function ($article) {
                $article['_links'] = [
                    '_links' => [
                        [
                            'type' => "GET",
                            'rel' => "self",
                            'href' => route('api.articles.show', ['id' => $article->id])
                        ],
                        [
                            'type' => "GET",
                            'rel' => "articles",
                            'href' => route('api.articles.index')
                        ]
                    ]
                ];
                return $article;
            })
        ];
    }
}
