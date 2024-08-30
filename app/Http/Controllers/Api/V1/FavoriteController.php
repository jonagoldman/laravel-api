<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Http\Requests\FavoriteGifRequest;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $favorites = $request->user()->favorites;

        return FavoriteResource::collection($favorites);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FavoriteGifRequest $request)
    {
        $favorite = $request->user()
            ->favorites()
            ->create($request->validated());

        return FavoriteResource::make($favorite);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return response()->json([
            'message' => 'Deleted',
        ], 204);
    }
}
