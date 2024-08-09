<?php

namespace App\Services\Access\Permissions;

use App\Models\Access\Permission\Permission;
use Illuminate\Http\Request;

class PermissionsService
{
    /**
     * @return mixed[]
     */
    public function listAll(): array
    {
        return Permission::all()->toArray();
    }

    public function listOne($id){
        return Permission::findOrFail($id)->toArray();
    }

    public function validateData(Request $request): bool{
        $request->validate([
            'name' => 'required',
        ]);
        return true;
    }

    public function store(array $data): Permission{
        return Permission::create($data);
    }
}
