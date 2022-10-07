<?php

namespace App\Http\Controllers\Api\Task;

use App\Http\Controllers\Api\Task\Dtos\TaskDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Task\UpdateTaskService;

class UpdateTaskController extends Controller
{
    protected UpdateTaskService $service;

    public function __construct(UpdateTaskService $updateTaskService)
    {
        $this->service = $updateTaskService;
    }

    /**
     * 
     */
    public function update(Request $request)
    {
        $dto = new TaskDto($request);
        return Response()->json(
            $this->service->execute($request->id, $dto),
            200
        );
    }
}
