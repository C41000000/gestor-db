<?php

namespace App\Services\Databases;

use App\Models\Databases;
use Illuminate\Http\Request;

class DatabasesService
{
    public function store(Array $data, Databases $database): \Illuminate\Http\JsonResponse
    {
        if($database->create($database))
            abort(500, 'An error occured while creating database');

        return response()->json(['success' => true]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validateData(Request $request): array
    {
        return $request->validate([
                'name' => 'string|required',
                'port' => 'string|required',
                'host' => 'string|required',
                'instance' => 'string|required',
                'username' => 'string|required',
                'password' => 'string|required'
        ]);
    }

}
