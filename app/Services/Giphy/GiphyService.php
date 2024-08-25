<?php

namespace App\Services\Giphy;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class GiphyService
{
    private PendingRequest $client;

    function __construct(
        protected string $url,
        protected string $key,
    ) {
        $this->client = Http::baseUrl(Str::finish($url, '/'))
            ->withQueryParameters([
                'api_key' => $key,
            ]);
    }

    public function get(string $id)
    {
        $response = $this->client->withUrlParameters([
            'id' => $id,
        ])->get('/{id}');

        return $response->object();
    }

    public function search(string $query, $limit, $offset)
    {
        $response = $this->client->withQueryParameters([
            'q' => $query,
            'limit' => $limit,
            'offset' => $offset,
        ])->get('search');

        return $response->object();
    }
}
