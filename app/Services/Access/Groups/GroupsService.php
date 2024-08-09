<?php

namespace App\Services\Access\Groups;
use App\Models\Access\Group\Group;
use Illuminate\Http\Request;

class GroupsService
{
    /**
     * @return array
     */
    public function findAll(): array
    {
        return  Group::all()->toArray();
    }

    /**
     * @param int $id
     * @return array
     */
    public function findOne(int $id): array{
       return Group::findOrFail($id)->toArray();
    }

    public function validateData(Request $request): true
    {
        $request->validate([
            'group_name' => 'required|unique:groups|max:255',
            'status' => 'required',
        ]);

        return true;
    }

    public function store(Array $data): Group{
        if(! $group = Group::create($data))
            abort(500, 'An error occured while creating groups.');
        return $group;
    }
}
