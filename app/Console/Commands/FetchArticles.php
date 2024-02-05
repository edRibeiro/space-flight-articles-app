<?php

namespace App\Console\Commands;

use App\DTO\Articles\CreateArticleDTO;
use App\Jobs\SaveArticlesJob;
use App\Services\ArticleService;
use App\Services\Contracts\ArticleServiceInterface;
use App\SpaceFlightNews\SpaceFlightNewsService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FetchArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private SpaceFlightNewsService $spaceFlightNews;
    private ArticleService $articleService;

    public function __construct(SpaceFlightNewsService $spaceFlightNews, ArticleServiceInterface $articleService)
    {
        parent::__construct();
        $this->spaceFlightNews = $spaceFlightNews;
        $this->articleService = $articleService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articleAmount = $this->articleService->count();
        $maxSpaceflightId = $this->articleService->getMaxSpaceflightId();

        $filter = [];
        if ($articleAmount > 0) {
            $filter = ['published_at_gt' => Carbon::yesterday()->startOfDay()->toIso8601ZuluString()];
        }

        $articleEntities = $this->spaceFlightNews->articles()->getAll($filter);

        if ($articleAmount > 0) {
            $articleEntities =  $articleEntities->where('spaceflight_id', '>', $maxSpaceflightId);
        }

        $this->processArticles($articleEntities);
    }

    /**
     * Process articles and dispatch SaveArticlesJob.
     *
     * @param \Illuminate\Support\Collection $articleEntities
     */
    protected function processArticles($articleEntities)
    {
        $bar = $this->output->createProgressBar(count($articleEntities));
        $bar->start();

        foreach ($articleEntities as $article) {
            $articleDTO = CreateArticleDTO::makeFromArticleEntity($article);
            SaveArticlesJob::dispatch($articleDTO);
            $bar->advance();
        }

        $bar->finish();
        $this->info(PHP_EOL . 'finished.');
    }
}
