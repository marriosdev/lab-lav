<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\LogoutService;

class LogoutController extends Controller
{
    protected LogoutService $service;

    public function __construct(LogoutService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        return Response()->json(
            $this->service->execute(),
            200,
        );
    }
}
