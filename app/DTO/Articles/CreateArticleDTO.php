<?php

namespace App\DTO\Articles;

use App\SpaceFlightNews\Entities\Article as ArticleEntity;
use Illuminate\Http\Request;

class CreateArticleDTO
{
    public $spaceflightId;
    public $title;
    public $url;
    public $imageUrl;
    public $newsSite;
    public $summary;
    public $publishedAt;
    public $updatedAt;
    public $featured;

    public function __construct(
        int $spaceflightId,
        string $title,
        string $url,
        string $imageUrl,
        string $newsSite,
        string $summary,
        string $publishedAt,
        string $updatedAt,
        bool $featured
    ) {
        $this->spaceflightId = $spaceflightId;
        $this->title = $title;
        $this->url = $url;
        $this->imageUrl = $imageUrl;
        $this->newsSite = $newsSite;
        $this->summary = $summary;
        $this->publishedAt = $publishedAt;
        $this->updatedAt = $updatedAt;
        $this->featured = $featured;
    }

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->spaceflight_id,
            $request->title,
            $request->url,
            $request->image_url,
            $request->news_site,
            $request->summary,
            $request->published_at,
            $request->last_updated_at,
            $request->featured
        );
    }

    public static function makeFromArticleEntity(ArticleEntity $article): self
    {
        return new self(
            $article->id,
            $article->title,
            $article->url,
            $article->image_url,
            $article->news_site,
            $article->summary,
            $article->published_at,
            $article->updated_at,
            $article->featured
        );
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            data_get($data, 'spaceflight_id'),
            data_get($data, 'title'),
            data_get($data, 'url'),
            data_get($data, 'image_url'),
            data_get($data, 'news_site'),
            data_get($data, 'summary'),
            data_get($data, 'published_at'),
            data_get($data, 'updated_at'),
            data_get($data, 'featured')
        );
    }

    public function toArray(): array
    {
        return [
            'spaceflight_id' => $this->spaceflightId,
            'title' => $this->title,
            'url' => $this->url,
            'image_url' => $this->imageUrl,
            'news_site' => $this->newsSite,
            'summary' => $this->summary,
            'published_at' => $this->publishedAt,
            'last_updated_at' => $this->updatedAt,
            'featured' => $this->featured,
        ];
    }
}
