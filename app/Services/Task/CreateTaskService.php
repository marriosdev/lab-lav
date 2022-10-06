<?php

namespace App\Services\Task;

use App\Repositories\Contracts\TaskRepositoryInterface;

class CreateTaskService
{
    protected TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    public function execute()
    {
        
    }
}