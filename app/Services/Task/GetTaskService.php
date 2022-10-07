<?php

namespace App\Services\Task;

use App\Exceptions\TaskNotFoundException;
use App\Repositories\TaskRepository;
use App\Http\Controllers\Api\Task\Dtos\ResponseTaskDto;

class GetTaskService
{
    protected TaskRepository $repository;

    /**
     * @param TaskRepositoru $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    /**
     * 
     */
    public function execute(int $id = null)
    {
        $task = ($id == null) ? $this->findAll() : $this->findById(($id)); 

        if($task == null) {
            throw new TaskNotFoundException();
        }

        return $task;
    }
    
    /**
     * get all tasks
     * @return 
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }
    
    /**
     * get task by id 
     * @return Task
     */
    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }
}
