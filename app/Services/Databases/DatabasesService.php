<?php

namespace App\Services\Databases;

use App\Models\Database\Databases;
use Illuminate\Http\Request;

class DatabasesService
{
    public function store(Array $data, int $id = null): true
    {
        if($id){
            $resource = Databases::findOrFail($id);

            if(!$resource->update($data))
                abort(500, "An error occured while updating the database.");
        }else{
            if(!Databases::create($data))
                abort(500, 'An error occured while creating database');

        }
        return true;
    }

    /**
     * @param int $id
     * @return true
     */
    public function remove(int $id): true
    {
        $resource = Databases::findOrFail($id);

        if(!$resource->delete())
            abort(500, "An error occured while deleting the database.");

        return true;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $allDatabases = Databases::all(['id', 'instance']);
        return $allDatabases->toArray();
    }

    /**
     * @param int $id
     * @return array
     */
   public function getOne(int $id): array{
        $database = Databases::select('id', 'instance')->where('id', $id)->first();
        return $database->toArray();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validateData(Request $request): array
    {
        return $request->validate([
            'instance' => 'string|required',
            'port' => 'string|required',
            'host' => 'string|required',
            'username' => 'string|required',
            'password' => 'string|required'
        ]);
    }

}
