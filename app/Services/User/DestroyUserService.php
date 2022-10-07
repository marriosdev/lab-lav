<?php

namespace App\Services\User;

use App\Exceptions\UserNotFoundException;
use App\Repositories\UserRepository;

class DestroyUserService
{
    protected UserRepository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function execute($id)
    {
        $users = $this->repository->findByid($id);
        if($users == NULL) {
            throw new UserNotFoundException();
        }
        $this->repository->destroy($users->id);
    }
}
