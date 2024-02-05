<?php

namespace App\Jobs;

use App\DTO\Articles\CreateArticleDTO;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class SaveArticlesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Collection $dtos)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->dtos->each(function (CreateArticleDTO $dto) {
            Article::create($dto->toArray());
        });
    }
}
