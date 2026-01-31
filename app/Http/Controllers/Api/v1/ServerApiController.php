<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\ServerApiRequest;
use App\Models\Server;
use App\Services\ServerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServerApiController extends Controller
{
    private ServerService $serverService;

    public function __construct()
    {
        $this->serverService = new ServerService();
    }

    public function index(): JsonResponse
    {
        $servers = Server::orderBy('id', 'desc')->get();
        return response()->json([
            'message' => 'Servers data fetched successfully',
            'list' => $servers
        ]);
    }
    public function store(ServerApiRequest $request): JsonResponse
    {
        $data = $request->validated();
        $result = $this->serverService->create($data);

        return response()->json([
            'message' => 'Server created successfully',
            'data' => $result,
        ]);
    }
    public function operation(Server $server, Request $request)//: JsonResponse
    {
        $result = $this->serverService->operation($server, $request->get('operation'));

        return response()->json([
            'message' => 'Server operation successful',
            'data' => $result ?? ''
        ]);
    }
}
