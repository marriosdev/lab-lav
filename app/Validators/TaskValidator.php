<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Task\Dtos\TaskDto;

class TaskValidator
{
    /**
     * Run validate
     * @return Validator
     */
    static function run(TaskDto $taskDto)
    {
        $messages = [
            ""
        ];

        $taskArray = [
            "title"       => $taskDto->title,
            "description" => $taskDto->description,
            "created_at"  => $taskDto->created_at,
            "user_id"     => $taskDto->user_id
        ];

        $validator = Validator::make($taskArray, [
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required|numeric'
        ]);

        return $validator;
    }
}