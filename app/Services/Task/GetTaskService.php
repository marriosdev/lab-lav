<?php

namespace App\Services\Task;

use App\Exceptions\TaskNotFoundException;
use App\Repositories\TaskRepository;
use App\Http\Controllers\Api\Task\Dtos\ResponseTaskDto;

class GetTaskService
{
    protected TaskRepository $repository;

    /**
     * @param TaskRepository $taskRepository
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
        $tasks = ($id == null) ? $this->findAll() : $this->findById(($id)); 

        if($tasks == null) {
            throw new TaskNotFoundException();
        }

        if($tasks::class ==  \App\Models\Task::class) {
            return new ResponseTaskDto($tasks);
        }
        
        if($tasks::class == \Illuminate\Database\Eloquent\Collection::class) {
            $tasksList = [];

            foreach($tasks as $task) {
                $tasksList[] = new ResponseTaskDto($task);
            }
            return $tasksList;
        }
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
