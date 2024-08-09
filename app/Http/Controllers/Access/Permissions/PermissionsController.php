<?php

namespace App\Http\Controllers\Access\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Access\Permissions\PermissionsService;
class PermissionsController extends Controller
{
    private PermissionsService $permissionService;

    public function __construct()
    {
        $this->permissionService = new PermissionsService();
    }

    /**
     * @return JsonResponse
     */
    public function listAll(): JsonResponse
    {
        $permissions = $this->permissionService->listAll();

        return response()->json(['list' => $permissions]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function listOne(int $id): JsonResponse
    {
        $permissions = $this->permissionService->listOne($id);

        return response()->json(['list' => $permissions]);
    }

    public function create(Request $request): JsonResponse{
        $this->permissionService->validateData($request);

        if(! $permission = $this->permissionService->store($request->only('name')))
            abort(500, 'An error occured while creating permission.');

        return response()->json(['permission' => $permission]);
    }
}
