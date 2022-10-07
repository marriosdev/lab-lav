<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Validators\Exceptions\ActionNotFoundException;
use App\Dto\DtoInterface;

/**
 * To create a new validation method you must add its action in $actions 
 * after that you must name the method in the same pattern as those that 
 * already exist starting with validateData followed by the action validateDataAction()
 */
class BaseValidator
{
    /**
     * @var Array $actions
     */
    protected static Array $actions = ["CREATE", "UPDATE"];

    /**
     * Run validate
     */
    static function run(DtoInterface $taskDto, String $action = null)
    {
        $action = strtoupper($action);
        return (in_array($action, static::$actions)) ? static::runValidate($taskDto, $action): throw new ActionNotFoundException("Invalid action");
    }

    /**
     * Validates the data for update a task
     * 
     * @return Illuminate\Validation\Validator $validator
     */
    static function runValidate(DtoInterface $taskDto, String $action = null) 
    {
        $method = "validateData".ucfirst(strtolower($action));
        return static::$method($taskDto);
    }
}