<?php

namespace App\DTO\Articles;

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
