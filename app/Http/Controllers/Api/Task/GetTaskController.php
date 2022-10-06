<?php

namespace App\Http\Controllers\Api\Task;

use App\Http\Controllers\Controller;
use App\Services\Task\GetTaskService;
use Illuminate\Http\Request;

class GetTaskController extends Controller
{
    protected GetTaskService $service;

    public function __construct(GetTaskService $getTaskService)
    {
        $this->service = $getTaskService;
    }

    public function findAll()
    {
        $this->service->execute();
    }

    public function findById(Request $request)
    {
        $this->service->execute($request->id);
    }
}
