<?php

namespace App\Http\Controllers\Api\Task;

use App\Exceptions\{
    TaskNotFoundException
};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Task\DestroyTaskService;

class DestroyTaskController extends Controller
{
    protected DestroyTaskService $service;

    public function __construct(DestroyTaskService $destroyTaskService)
    {
        $this->service = $destroyTaskService;
    }

    public function destroy(Request $request)
    {
        $this->service->execute($request->id);
        return response()->json(["ok"], 200);
    }
}
