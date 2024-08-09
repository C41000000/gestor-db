<?php

namespace App\Http\Controllers\Access\Groups;

use App\Http\Controllers\Controller;
use App\Services\Access\Groups\GroupsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    private GroupsService $groupService;

    public function __construct()
    {
        $this->groupService = new GroupsService();
    }

    public function listAll(): JsonResponse
    {
        return response()->json([
          'list' => $this->groupService->findAll()
        ]);
    }

    public function listOne(int $id): JsonResponse
    {
        return response()->json([
           'list' => $this->groupService->findOne($id)
        ]);
    }

    public function create(Request $request): JsonResponse
    {
        $this->groupService->validateData($request);

        if(! $group = $this->groupService->store($request->only('group_name', "status")))
            abort(500, "An error occured while creating group");

        return response()->json([
            'group' => $group
        ]);
    }
}
