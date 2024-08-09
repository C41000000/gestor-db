<?php

namespace App\Http\Controllers\Databases;

use App\Http\Controllers\Controller;
use App\Service\Databases\Databases;
use App\Services\Databases\DatabasesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DatabasesController extends Controller
{
    public function list(){

    }

    /**
     * @param Request $request
     * @param \App\Models\Databases $dataBase
     * @return JsonResponse
     */
    public function create(Request $request, \App\Models\Databases $dataBase): JsonResponse
    {
        $databases = new DatabasesService();

        if(!$databases->validateData($request))
            abort(400, 'Invalid data');

        return $databases->store($request->only(['name', 'port', 'host', 'instance', 'username', 'password']), $dataBase);
    }
    public function update(){

    }
    public function delete(){

    }
}
