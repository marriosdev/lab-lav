<?php

namespace App\Http\Controllers\Api\User;

use App\Exceptions\{
    UserNotFoundException
};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\DestroyUserService;

class DestroyUserController extends Controller
{
    protected DestroyUserService $service;

    public function __construct(DestroyUserService $destroyUserService)
    {
        $this->service = $destroyUserService;
    }

    public function destroy(Request $request)
    {
        $this->service->execute($request->id);
        return response()->json(["ok"], 200);
    }
}
