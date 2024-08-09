<?php

namespace App\Models\Access\UserPermission;

use App\Models\Access\Permission\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserPermission extends Model
{
    use HasFactory;
    protected $table = 'user_permission';

    protected $fillable = [
        'user_id',
        'permission_id'
    ];

    public function permission(): HasMany
    {
        return $this->hasMany(Permission::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
