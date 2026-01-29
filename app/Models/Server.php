<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'user_id',
        'name',
        'alias',
        'ip',
        'port',
        'username',
        'password',
        'key',
        'status',
        'type',
    ];
}
