<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\ServerApiRequest;

class ServerApiController extends Controller
{
    public function store(ServerApiRequest $request)
    {
        $data = $request->validated();

        return response()->json([
            'message' => 'Server created successfully',
            'data' => $data,
        ]);
    }
}
