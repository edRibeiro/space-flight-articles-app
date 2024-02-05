<?php

namespace App\SpaceFlightNews\Facades;

use App\SpaceFlightNews\SpaceFlightNewsService;
use Illuminate\Support\Facades\Facade;

class SpaceFlightNews extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SpaceFlightNewsService::class;
    }
}
