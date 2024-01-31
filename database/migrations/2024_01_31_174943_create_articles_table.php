<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('article_id')->unique();
            $table->string('title');
            $table->string('url');
            $table->string('image_url');
            $table->string('news_site');
            $table->text('summary');
            $table->dateTime('published_at');
            $table->dateTime('last_updated_at');
            $table->boolean('featured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
