<?php

namespace App\SpaceFlightNews;

use App\SpaceFlightNews\Endpoints\HasArticles;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Space Flight News Api
 * https://api.spaceflightnewsapi.net
 */
class SpaceFlightNewsService
{
    use HasArticles;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'X-Rapidapi-Key'  => config('services.sport_score.key'),
            'X-Rapidapi-Host' => 'sportscore1.p.rapidapi.com',
        ])->baseUrl('https://api.spaceflightnewsapi.net');
    }
}
