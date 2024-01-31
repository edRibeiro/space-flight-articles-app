<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['article_id',    'title',    'url',    'image_url',    'news_site',    'summary',    'published_at',    'last_updated_at',    'featured'];

    function launches(): HasMany
    {
        return $this->hasMany(ArticleLaunch::class);
    }

    function events(): HasMany
    {
        return $this->hasMany(ArticleEvent::class);
    }
}