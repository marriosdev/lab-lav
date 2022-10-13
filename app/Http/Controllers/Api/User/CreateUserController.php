<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\User\Dtos\UserDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\CreateUserService;

class CreateUserController extends Controller
{
    protected CreateUserService $service;

    public function __construct(CreateUserService $createUserService)
    {
        $this->service = $createUserService;
    }

    public function create(Request $request)
    {
        $dto = new UserDto($request);
        $this->service->execute($dto);
        return Response()->json([], 201);
    }
}
