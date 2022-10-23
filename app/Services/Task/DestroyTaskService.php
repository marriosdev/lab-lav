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
        $task = $this->repository->findByid($id);
        if($task == NULL) {
            throw new TaskNotFoundException(); 
        }
        $this->repository->destroy($task->id);
    }
}
