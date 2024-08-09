<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $AuthService = new AuthService();

        return $AuthService->login($request->only('email', 'password'));
    }

    public function logout(Request $request): JsonResponse
    {
        $AuthService = new AuthService();

        return $AuthService->logout();

    }
}
