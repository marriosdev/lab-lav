<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository;

class GetTaskService
{
    protected TaskRepository $repository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    public function execute($id = null)
    {
        if($id == null) {
            echo "ihi";
            var_dump($this->repository->findAll());
        }else{
            var_dump($this->repository->findById($id));
        }
    }
}