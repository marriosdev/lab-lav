<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\User\Dtos\UserDto;
use App\Validators\BaseValidator;

/**
 * To create a new validation method you must add its action in $actions 
 * after that you must name the method in the same pattern as those that 
 * already exist starting with validateData followed by the action validateDataAction()
 */
class UserValidator extends BaseValidator
{
    /**
     * @var Array $actions
     */
    protected static Array $actions = ["CREATE", "UPDATE"];
    
    /**
     * @return Illuminate\Validation\Validator $validator
     */
    static function validateDataCreate(UserDto $userDto)
    {
        $messages = [""];

        $userArray = [
            "name"      => $userDto->name,
            "email"     => $userDto->email,
            "password"  => $userDto->password
        ];

        $validator = Validator::make($userArray, [
            'name'      => 'required|max:255|min:2',
            'email'     => 'required|email|unique:App\Models\User,email',
            'password'  => 'required|min:8'
        ]);

        return $validator;
    }

    /**
     * Validates the data for creating a new user
     * 
     * @return Illuminate\Validation\Validator $validator
     */
    static function validateDataUpdate(UserDto $userDto)
    {
        $messages   = [];
        $validators = [];
        $userArray  = [];

        if(!is_null($userDto->name)) {
            $validators["name"] = "max:255|min:2";
            $userArray["name"]  = $userDto->name;
        }
        
        if(!is_null($userDto->email)) {
            $validators["email"] = "email|unique:App\Models\User,email";
            $userArray["email"]  = $userDto->email;
        }

        if(!is_null($userDto->password)) {
            $validators["password"] = "min:8";
            $userArray["password"]  = $userDto->password;
        }
        $validator = Validator::make($userArray, $validators);

        return $validator;
    }
}