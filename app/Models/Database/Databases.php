<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databases extends Model
{
    use HasFactory;

    protected $fillable = [
        'instance',
        'port',
        'host',
        'username',
        'password'
    ];

}
