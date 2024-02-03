<?php

namespace App\SpaceFlightNews\Facades;

use App\Services\SpaceFlightNews\SpaceFlightNewsService;
use Illuminate\Support\Facades\Facade;

class SpaceFlightNews extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SpaceFlightNewsService::class;
    }
}
