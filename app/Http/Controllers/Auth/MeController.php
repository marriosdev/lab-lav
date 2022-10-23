<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\MeService;

class MeController extends Controller
{
    protected MeService $service;

    public function __construct(MeService $service)
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
