<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Task\Dtos\TaskDto;
use App\Validators\Exceptions\ActionNotFoundException;


/**
 * To create a new validation method you must add its action in $actions 
 * after that you must name the method in the same pattern as those that 
 * already exist starting with validateData followed by the action validateDataAction()
 */
class TaskValidator
{
    /**
     * @var Array $actions
     */
    private static Array $actions = ["CREATE", "UPDATE"];

    /**
     * Run validate
     */
    static function run(TaskDto $taskDto, String $action = null)
    {
        $action = strtoupper($action);
        return (in_array($action, self::$actions)) ? self::runValidate($taskDto, $action): throw new ActionNotFoundException("Invalid action");
    }

    /**
     * Validates the data for update a task
     * 
     * @return Illuminate\Validation\Validator $validator
     */
    static function runValidate(TaskDto $taskDto, String $action = null) 
    {
        $method = "validateData".ucfirst(strtolower($action));
        return self::$method($taskDto);
    }
    
    /**
     * @return Illuminate\Validation\Validator $validator
     */
    static function validateDataCreate(TaskDto $taskDto)
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
}