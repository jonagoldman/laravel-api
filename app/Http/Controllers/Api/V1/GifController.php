<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchGifRequest;
use App\Services\Giphy\GiphyService;

class GifController extends Controller
{
    public function __construct(
        private GiphyService $giphy
    ) {}

    public function show(Request $request, string $id)
    {
        $response = $this->giphy->get($id);

        return $response;
    }

    public function search(SearchGifRequest $request)
    {
        $response = $this->giphy->search(
            $request->validated('query'),
            $request->validated('limit'),
            $request->validated('offset'),
        );

        return $response;
    }
}
