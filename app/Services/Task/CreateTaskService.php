<?php

namespace App\Services\Task;

use App\Exceptions\InvalidTaskDataException;
use App\Repositories\TaskRepository;
use App\Http\Controllers\Api\Task\Dtos\TaskDto;
use App\Validators\TaskValidator;

class CreateTaskService
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
     * Create new task
     */
    public function execute(TaskDto $taskDto)
    {
        $validator = TaskValidator::run($taskDto, "CREATE");
        $task = [
            "title"       => $taskDto->title,
            "description" => $taskDto->description,
            "user_id"     => auth("api")->user()->id,
            "status_id"   => 1
        ];

        /**
         * @var \Illuminate\Validation\Validator $validator
         */
        return $validator->fails() ? throw new InvalidTaskDataException($validator->messages()) : $this->repository->create($task); 
    }
}
