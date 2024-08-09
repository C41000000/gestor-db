<?php

namespace App\Services\Auth;

use Illuminate\Http\JsonResponse;

class AuthService
{
    /**
     * @param array $credentials
     * @return JsonResponse
     */
    public function login(Array $credentials): JsonResponse
    {
        if(!auth()->attempt($credentials))
            abort(401, "Invalid credentials");

        $token = auth()->user()->createToken("auth_token");
        return response()->json(['token' => $token->plainTextToken]);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse{
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
