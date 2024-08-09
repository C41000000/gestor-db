<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Auth\RegisterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private RegisterService $registerService;
    public function __construct()
    {
        $this->registerService = new RegisterService();
    }

    /**
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        return response()->json([
            'user' => $this->registerService->store($request->only("name", 'email', 'password'))
        ]);
    }
}
