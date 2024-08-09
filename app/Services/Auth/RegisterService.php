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
    public function store(Array $userData): User
    {
        if(!$user = User::create($userData))
            abort(400, "Invalid data");
        return $user;
    }
}
