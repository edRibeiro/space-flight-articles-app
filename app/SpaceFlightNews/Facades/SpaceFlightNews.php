<?php

namespace App\SpaceFlightNews\Facades;

use App\SpaceFlightNews\SpaceFlightNewsApi;
use Illuminate\Support\Facades\Facade;

class SpaceFlightNews extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SpaceFlightNewsApi::class;
    }
}
