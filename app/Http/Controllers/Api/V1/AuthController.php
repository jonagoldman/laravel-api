<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $auth
    ) {}

    public function login(LoginUserRequest $request)
    {
        $validated = $request->validated();

        $data = $this->auth->login($validated['email'], $validated['password']);

        return response()->json($data);
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
