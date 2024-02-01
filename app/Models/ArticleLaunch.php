<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleLaunch extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_launches';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'launch_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['article_id', 'launch_id', 'provider'];

    /*  public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    } */
}
