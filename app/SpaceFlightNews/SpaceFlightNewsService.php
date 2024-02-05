<?php

namespace App\SpaceFlightNews;

use App\SpaceFlightNews\Contracts\SpaceFlightNewsServiceInterface;
use App\SpaceFlightNews\Endpoints\HasArticles;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Space Flight News Api
 * https://api.spaceflightnewsapi.net
 */
class SpaceFlightNewsService implements SpaceFlightNewsServiceInterface
{
    use HasArticles;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->baseUrl('https://api.spaceflightnewsapi.net');
    }
}
