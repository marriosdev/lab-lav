<?php

namespace App\Services\Task;

use App\Http\Controllers\Api\Task\Dtos\TaskDto;
use App\Repositories\TaskRepository;
use App\Exceptions\InvalidTaskDataException;
use App\Exceptions\TaskNotFoundException;
use App\Http\Controllers\Api\Task\Dtos\ResponseTaskDto;
use App\Validators\TaskValidator;

class UpdateTaskService
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
     * 
     */
    public function execute($id = null, TaskDto $taskDto)
    {
        $validator = TaskValidator::run($taskDto, "UPDATE");

        $task = [
            "title"       => $taskDto->title,
            "description" => $taskDto->description,
        ];
        
        
        /**
         * @var Illuminate\Validation\Validator $validator
         */
        if($validator->fails()) {
            throw new InvalidTaskDataException($validator->messages());
        }

        
        if ($this->repository->update($id, $task)) {
            return new ResponseTaskDto($this->repository->findById($id));
        }else{
            throw new TaskNotFoundException();
        }
    }
}