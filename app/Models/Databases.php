<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databases extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'port',
        'host',
        'instance',
        'username',
        'password'
    ];
}
