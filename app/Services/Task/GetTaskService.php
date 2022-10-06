<?php

namespace App\Services\Task;

use App\Exceptions\TaskNotFoundException;
use App\Repositories\TaskRepository;

class GetTaskService
{
    protected TaskRepository $repository;

    /**
     * 
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    /**
     * @param int $id
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
        $tasks = $this->repository->findAll();
        
        return $tasks;
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
