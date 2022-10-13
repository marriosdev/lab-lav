<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\User\GetUserService;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    protected GetUserService $service;

    public function __construct(GetUserService $getUserService)
    {
        $this->service = $getUserService;
    }

    public function findAll()
    {
        return response()->json($this->service->execute(), 200);
    }

    public function findById(Request $request)
    {
        return response()->json($this->service->execute($request->id), 200);
    }
}
