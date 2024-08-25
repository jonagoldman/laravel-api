<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Enums\TokenType;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function login(LoginUserRequest $request)
    {
        // Find User by email
        $user = User::where('email', $request->email)->first();

        // Validate password
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Create Token and return response
        return response()->json([
            'type' => TokenType::BEARER,
            'token' => $user->createToken('postman')->plainTextToken,
            'user_id' => $user->id,
        ]);
    }

    public function logout(Request $request)
    {
        // Revoke all user tokens
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out',
        ]);
    }
}
