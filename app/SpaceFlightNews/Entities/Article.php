<?php



namespace App\SpaceFlightNews\Entities;

class Article
{
    public readonly int $id;
    public readonly string $title;
    public readonly string $url;
    public readonly string $image_url;
    public readonly string $news_site;
    public readonly string $summary;
    public readonly string $published_at;
    public readonly string $updated_at;
    public readonly bool $featured;

    public function __construct(array $data)
    {
        $this->id = data_get($data, 'id');
        $this->title = data_get($data, 'title');
        $this->url = data_get($data, 'url');
        $this->image_url = data_get($data, 'image_url');
        $this->news_site = data_get($data, 'news_site');
        $this->summary = data_get($data, 'summary');
        $this->published_at = data_get($data, 'published_at');
        $this->updated_at = data_get($data, 'updated_at');
        $this->featured = data_get($data, 'featured');
    }
}
