<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    
    /**
     * @var App\Models\Task $entity
     */
    protected  User $entity;

    /**
     * 
     */
    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    /**
     * 
     */
    public function getById($id)
    {
        return $this->entity->getById($id);
    }

    /**
     * 
     */
    public function getAll()
    {
        return $this->entity->getAll();
    }

    /**
     * 
     */
    public function destroy(int $id)
    {
        return $this->entity->destroy($id);
    }

    /**
     * 
     */
    public function update(int $id, array $user)
    {
        return $this->entity->update($id, $user);
    }

    /**
     * 
     */
    public function create(array $user)    
    {
        return $this->entity->create($user);
    }
}