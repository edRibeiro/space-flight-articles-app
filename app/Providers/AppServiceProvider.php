<?php

namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Repositories\Contracts\SpaceFlightArticleRepositoryInterface;

use App\Repository\SpaceFlightArticleRepository;
use App\Services\ArticleService;
use App\Services\Contracts\ArticleServiceInterface;
use App\Services\Contracts\SpaceFlightArticleServiceInterface;
use App\Services\SpaceFlightArticleService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(SpaceFlightArticleRepositoryInterface::class, SpaceFlightArticleRepository::class);
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);
        $this->app->bind(SpaceFlightArticleServiceInterface::class, SpaceFlightArticleService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
