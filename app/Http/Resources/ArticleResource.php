<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @return array<string, mixed>
     */
    public function with(Request $request): array
    {
        return [
            '_links' => [
                [
                    'type' => "GET",
                    'rel' => "self",
                    'href' => route('api.articles.show', ['id' => $this->id])
                ],
                [
                    'type' => "GET",
                    'rel' => "articles",
                    'href' => route('api.articles.index')
                ]
            ]
        ];
    }
}
