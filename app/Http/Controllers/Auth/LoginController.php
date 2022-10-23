<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\LoginService;

class LoginController extends Controller
{
    protected LoginService $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        $credentials = request(['email', 'password']);
        return Response()->json(
            $this->service->execute($credentials),
            200
        );
    }
}
