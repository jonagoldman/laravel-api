<?php

namespace App\Services\Giphy;

use App\Services\Giphy\GiphyService;
use Illuminate\Support\ServiceProvider;

class GiphyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(GiphyService::class, function ($app) {
            return new GiphyService(config('services.giphy.url'), config('services.giphy.key'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
