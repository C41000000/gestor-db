<?php

namespace App\Http\Controllers\Databases;

use App\Http\Controllers\Controller;
use App\Models\Database\Databases;
use App\Services\Databases\DatabasesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DatabasesController extends Controller
{
    protected DatabasesService $databasesService;
    public function __construct()
    {
        $this->databasesService = new DatabasesService();
    }

    public function listAll(): JsonResponse{

        return response()->json([
            'list' => $this->databasesService->getAll()
        ]);
    }

    public function listOne(int $id): JsonResponse
    {
        return response()->json([
            'list' => $this->databasesService->getOne($id)
        ]);
    }

    /**
     * @param Request $request
     * @param Databases $dataBase
     * @return JsonResponse
     */
    public function create(Request $request, Databases $dataBase): JsonResponse
    {
        $this->databasesService->validateData($request);
        return response()->json(['success' => $this->databasesService->store($request->only(['name', 'port', 'host', 'instance', 'username', 'password']),
        )]);
    }
    public function update(Request $request, int $id, Databases $dataBase): JsonResponse{
        $this->databasesService->validateData($request);

        return response()->json(['success' => $this->databasesService->store($request->only(['name', 'port', 'host', 'instance', 'username', 'password']),
            $id
        )]);
    }
    public function delete(int $id): JsonResponse
    {
        return response()->json(['success' => $this->databasesService->remove($id)]);
    }
}
