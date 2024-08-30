<?php

namespace App\Services\Giphy;

use Illuminate\Http\Client\PendingRequest;

class GiphyService
{
    public function __construct(
        private PendingRequest $client
    ) {}

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
