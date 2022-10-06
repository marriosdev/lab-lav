<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;

class DestroyTaskService
{
    protected TaskRepository $repository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    public function execute()
    {
        
    }
}