<?php

namespace App\Services\Auth;

use Illuminate\Http\JsonResponse;

class AuthService
{
    /**
     * @param array $credentials
     * @return JsonResponse
     */
    public function login(Array $credentials): string
    {
        if(!auth()->attempt($credentials))
            abort(401, "Invalid credentials");

        $token = auth()->user()->createToken("auth_token");
        return $token->plainTextToken;
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse{
        auth()->user()->tokens()->delete();
        return true;
    }
}
