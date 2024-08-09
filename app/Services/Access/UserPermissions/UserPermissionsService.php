<?php

namespace App\Services\Access\UserPermissions;

use App\Models\Access\Permission\Permission;
use App\Models\Access\UserPermission\UserPermission;
use App\Models\User;
use Illuminate\Http\Request;

class UserPermissionsService
{
    /**
     * @return array
     */
    public function listAll(): array
    {
        return Permission::all()->toArray();
    }

    public function listOne(int $id): array
    {
        return Permission::findOrFail($id)->toArray();
    }

    public function store(array $data, int $id = null): UserPermission
    {
        if($id){
            $resource = UserPermission::findOrFail($id);
            $permission = Permission::findOrFail($data['permission_id']);
            $user = User::findOrFail($data['user_id']);

            $resource->update($data);
        }else{
            if(! $resource = UserPermission::create($data))
                abort(500, 'An error occured while creating permission.');
        }
        return $resource;
    }
    public function delete(int $id): bool{
        $resource = UserPermission::findOrFail($id);
        $resource->delete();

        return true;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function validateData(Request $request): bool
    {
        $request->validate([
            'user_id' => 'required',
            'permission_id' => 'required'
        ]);
        return true;
    }
}
