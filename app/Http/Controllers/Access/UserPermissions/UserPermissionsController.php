<?php

namespace App\Http\Controllers\Access\UserPermissions;

use App\Http\Controllers\Controller;
use App\Services\Access\UserPermissions\UserPermissionsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserPermissionsController extends Controller
{
    private UserPermissionsService $userPermissionsService;

    public function __construct()
    {
        $this->userPermissionsService = new UserPermissionsService();
    }

    /**
     * @return JsonResponse
     */
    public function listAll(): JsonResponse
    {
        $allPermissions = $this->userPermissionsService->listAll();

        return response()->json([
            'list' => $allPermissions
        ]);
    }

    /**
     * @param int $id
     * @return void
     */
    public function listOne(int $id): JsonResponse
    {
        $permissions = $this->userPermissionsService->listOne($id);
        return response()->json([
           'list' => $permissions
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $this->userPermissionsService->validateData($request);
        $userPermission = $this->userPermissionsService->store($request->only('user_id', 'permission_id'));

        return response()->json([
            'userPermission' => $userPermission
        ]);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $this->userPermissionsService->validateData($request);
        $permission = $this->userPermissionsService->store($request->only('user_id', 'permission_id'), $id);

        return response()->json([
            'userPermission' => $permission
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        $return = $this->userPermissionsService->delete($id);
        return response()->json([
            'result' => $return
        ]);
    }
}
