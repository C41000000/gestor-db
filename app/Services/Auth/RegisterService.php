<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterService
{
    /**
     * @param array $userData
     * @param User $user
     * @return JsonResponse
     */
    public function store(Array $userData, User $user): JsonResponse
    {
        if(!$user = $user->create($userData))
            abort(400, "Invalid data");

        return response()->json(['user' => $user]);
    }
}
