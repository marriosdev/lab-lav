<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Task\Dtos\TaskDto;
use App\Validators\BaseValidator;

/**
 * To create a new validation method you must add its action in $actions 
 * after that you must name the method in the same pattern as those that 
 * already exist starting with validateData followed by the action validateDataAction()
 */
class TaskValidator extends BaseValidator
{
    /**
     * @var Array $actions
     */
    protected static Array $actions = ["CREATE", "UPDATE"];
    
    /**
     * @return Illuminate\Validation\Validator $validator
     */
    static function validateDataCreate(TaskDto $taskDto)
    {
        $messages = [""];

        $taskArray = [
            "title"       => $taskDto->title,
            "description" => $taskDto->description,
        ];

        $validator = Validator::make($taskArray, [
            'title'       => 'required|max:255',
            'description' => 'required',
        ]);

        return $validator;
    }

    /**
     * Validates the data for creating a new task
     * 
     * @return Illuminate\Validation\Validator $validator
     */
    static function validateDataUpdate(TaskDto $taskDto)
    {
        $messages = [
            ""
        ];

        $validators = [];
        $taskArray  = [];

        if(!is_null($taskDto->title)) {
            $validators["title"] = "max:255|min:1";
            $taskArray["title"]  = $taskDto->title;
        }
        
        if(!is_null($taskDto->description)) {
            $validators["description"] = "";
            $taskArray["description"]  = $taskDto->description;
        }
        
        if(!is_null($taskDto->status)) {
            $validators["status"] = "numeric|exists:App\Models\TaskStatus,id";
            $taskArray["status"]  = $taskDto->status;
        }

        $validator = Validator::make($taskArray, $validators);

        return $validator;
    }
}