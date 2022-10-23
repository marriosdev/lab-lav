<?php

namespace App\Services\Task;

use App\Exceptions\TaskNotFoundException;
use App\Repositories\TaskRepository;

class DestroyTaskService
{
    protected TaskRepository $repository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    public function execute($id)
    {
        $userId = auth("api")->user()->id;
        $task = $this->repository->findByIdTaskUser($id, $userId);
        if($task == NULL) {
            throw new TaskNotFoundException();
        }
        $this->repository->destroy($task->id, $userId);
    }
}