<?php

namespace App\Services\User;

use App\Http\Controllers\Api\User\Dtos\UserDto;
use App\Repositories\UserRepository;
use App\Exceptions\InvalidUserDataException;
use App\Exceptions\UserNotFoundException;
use App\Http\Controllers\Api\User\Dtos\ResponseUserDto;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Hash;

class UpdateUserService
{
    protected UserRepository $repository;

    /**
     * 
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * 
     */
    public function execute($id = null, UserDto $userDto)
    {
        $validator = UserValidator::run($userDto, "UPDATE");
        
        $userArray  = [];

        if(!is_null($userDto->name)) {
            $userArray["name"] = $userDto->name;
        }
        
        if(!is_null($userDto->email)) {
            $userArray["email"] = $userDto->email;
        }

        if(!is_null($userDto->password)) {
            $userArray["password"] = Hash::make($userDto->password);
        }

        /**
         * @var Illuminate\Validation\Validator $validator
         */
        if($validator->fails()) {
            throw new InvalidUserDataException($validator->messages());
        }
        
        if ($this->repository->update($id, $userArray)) {
            return new ResponseUserDto($this->repository->findById($id));
        }else{
            throw new UserNotFoundException();
        }
    }
}