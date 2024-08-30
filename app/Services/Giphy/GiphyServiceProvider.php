<?php

namespace App\Services\Giphy;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use App\Services\Giphy\GiphyService;

class GiphyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(GiphyService::class, function (Application $app) {
            $client = Http::baseUrl(Str::finish(config('services.giphy.url'), '/'))
                ->withQueryParameters([
                    'api_key' => config('services.giphy.key'),
                ])->acceptJson();

            return new GiphyService($client);
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
