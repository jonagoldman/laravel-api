<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Enums\TokenType;

class AuthService
{
    public function login(string $email, string $password): array
    {
        // Find User by email
        $user = User::where('email', $email)->first();

        // Validate password
        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Create Token and return data
        return [
            'type' => TokenType::BEARER,
            'token' => $user->createToken('postman')->plainTextToken,
            'user_id' => $user->id,
        ];
    }
}
