<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;

class UpdateTaskService
{
    protected TaskRepository $repository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    public function execute($id = null, Array $task)
    {
        $this->repository->update($id, $task);
    }
}