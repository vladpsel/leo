<?php

declare(strict_types=1);

namespace App\Services;
use App\Enums\Server\ServerStatus;
use App\Models\Server;
use Illuminate\Support\Facades\Auth;

class ServerService
{
    private $user;
    public function __construct($user = null)
    {
        $this->user = $user ?? Auth::user();
    }

    public function create(?array $data): ?Server
    {
        if (empty($data)) {
            return null;
        }

        $server = new Server();
        $server->fill($data);
        $server->user_id = $this->user->id;
        $server->alias = uniqid();
        $server->status = ServerStatus::STATUS_NEW->value;
        $server->directory = $data['directory'] ?? '/var/www/';
        $server->save();
        return $server;


    }
}
