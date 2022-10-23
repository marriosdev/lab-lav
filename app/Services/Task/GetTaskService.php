<?php

namespace App\Services\Task;

use App\Exceptions\TaskNotFoundException;
use App\Repositories\TaskRepository;
use App\Http\Controllers\Api\Task\Dtos\ResponseTaskDto;

class GetTaskService
{
    protected TaskRepository $repository;

    /**
     * @param \App\Repositories\TaskRepository $taskRepository
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

        $userId = auth("api")->user()->id;

        $tasks = ($id == null) ? $this->repository->findAllTaskUser($userId) : $this->repository->findByIdTaskUser($id, $userId); 

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
}
