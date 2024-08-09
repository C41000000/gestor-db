<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Auth\RegisterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function register(Request $request, User $user): JsonResponse
    {
        $registerService = new RegisterService();

        return $registerService->store($request->only("name", 'email', 'password'), $user);
    }
}
