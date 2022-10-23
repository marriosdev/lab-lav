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
        
        $taskArray  = [];

        if(!is_null($taskDto->title)) {
            $taskArray["title"] = $taskDto->title;
        }
        
        if(!is_null($taskDto->description)) {
            $taskArray["description"] = $taskDto->description;
        }

        if(!is_null($taskDto->status)) {
            $taskArray["status_id"] = $taskDto->status;
        }
      
        /**
         * @var \Illuminate\Validation\Validator $validator
         */
        if($validator->fails()) {
            throw new InvalidTaskDataException($validator->messages());
        }
        
        if ($this->repository->update($id, $taskArray, auth("api")->user()->id)) {
            return new ResponseTaskDto($this->repository->findById($id));
        }else{
            throw new TaskNotFoundException();
        }
    }
}