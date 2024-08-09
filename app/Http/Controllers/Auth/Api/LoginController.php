<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
class LoginController extends Controller
{
    protected AuthService $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = new AuthService();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        return response()->json([
            'token' => $this->authService->login($request->only('email', 'password'))
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        return response()->json([
           'status' => $this->authService->logout()
        ]);
    }
}
