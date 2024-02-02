<?php

namespace App\SpaceFlightNews\Endpoints;


trait HasArticles
{
    public function articles(): Articles
    {
        return new Articles();
    }
}
