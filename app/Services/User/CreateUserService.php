<?php

namespace App\Services\User;

use App\Exceptions\InvalidUserDataException;
use App\Repositories\UserRepository;
use App\Http\Controllers\Api\User\Dtos\UserDto;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Hash;

class CreateUserService
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
     * Create new task
     */
    public function execute(UserDto $userDto)
    {
        $validator = UserValidator::run($userDto, "CREATE");

        $user = [
            "name"  => $userDto->name,
            "email" => $userDto->email,
            "password"  => Hash::make($userDto->password),
        ];
        
        /**
         * @var Illuminate\Validation\Validator $validator
         */
        return $validator->fails() ? throw new InvalidUserDataException($validator->messages()) : $this->repository->create($user); 
    }
}
