<?php

namespace App\Http\Controllers\Api\Task;

use App\Http\Controllers\Api\Task\Dtos\TaskDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Task\CreateTaskService;

class CreateTaskController extends Controller
{
    protected CreateTaskService $service;

    public function __construct(CreateTaskService $createTaskService)
    {
        $this->service = $createTaskService;
    }

    public function create(Request $request)
    {
        $dto = new TaskDto($request);
        $this->service->execute($dto);
        return Response()->json([], 201);
    }
}
