<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    protected UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * 
     */
    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    /**
     * 
     */
    public function getAll()
    {
        return $this->repository->getAll();
    }

    /**
     * 
     */
    public function destroy(int $id)
    {
        return $this->repository->destroy($id);
    }

    /**
     * 
     */
    public function update(int $id, array $task)
    {
        return $this->repository->update($id, $task);
    }

    /**
     * 
     */
    public function create(array $task)    
    {
        return $this->repository->create($task);
    }
}