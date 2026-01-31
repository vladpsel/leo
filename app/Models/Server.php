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
        'tags',
        'alias',
        'ip',
        'port',
        'username',
        'pswd',
        'key',
        'status',
        'type',
        'directory',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
