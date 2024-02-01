<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticleFactory::factory()
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
