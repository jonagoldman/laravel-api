<?php

namespace App\Services\Giphy;

use Illuminate\Support\Facades\Facade;
use App\Services\Giphy\GiphyService;

class Giphy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GiphyService::class;
    }
}
