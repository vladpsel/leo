<?php

declare(strict_types=1);

namespace App\Services;
use App\Enums\Server\ServerStatus;
use App\Models\Server;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Net\SSH2;

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

    public function operation(Server $server, string $operation)
    {
        match ($operation) {
            'ping' => $res = $this->pingOperation($server),
        };

        return $res ?? null;
    }

    private function pingOperation($server)
    {
        $ssh = new SSH2($server->ip);
        $ssh->login($server->username, $server->pswd);
        return nl2br(e($ssh->exec('ls -la /')));
    }
}
