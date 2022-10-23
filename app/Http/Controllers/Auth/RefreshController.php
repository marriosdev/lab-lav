<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\RefreshService;

class RefreshController extends Controller
{
    protected RefreshService $service;

    public function __construct(RefreshService $service)
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
