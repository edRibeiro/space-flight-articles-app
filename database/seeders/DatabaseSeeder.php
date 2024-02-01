<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::factory()
            ->count(10)
            ->state(new Sequence(
                fn (Sequence $sequence) => [
                    'spaceflight_id' => ++($sequence->index),
                    'title' => fake()->sentence(),
                    'url' => fake()->url(),
                    'image_url' => fake()->imageUrl(),
                    'news_site' => fake()->sentence(2),
                    'summary' => fake()->sentence(8),
                    'published_at' => fake()->dateTime(),
                    'last_updated_at' => fake()->dateTime(),
                    'featured' => fake()->boolean()
                ],
            ))
            ->create();
    }
}
