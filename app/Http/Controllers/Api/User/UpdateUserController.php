<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\User\Dtos\UserDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\UpdateUserService;

class UpdateUserController extends Controller
{
    protected UpdateUserService $service;

    public function __construct(UpdateUserService $updateUserService)
    {
        $this->service = $updateUserService;
    }

    /**
     * 
     */
    public function update(Request $request)
    {
        $dto = new UserDto($request);
        return Response()->json(
            $this->service->execute($request->id, $dto),
            200
        );
    }
}
