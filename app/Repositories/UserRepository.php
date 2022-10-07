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
    public function findById($id)
    {
        return $this->entity->find($id);
    }

    /**
     * 
     */
    public function findAll()
    {
        return $this->entity->all();
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
    public function update(int $id, Array $user)
    {
        if($this->entity->find($id) == NULl) {
            return false;
        }
        return $this->entity->where("id", $id)->update($user);
    }

    /**
     * 
     */
    public function create(array $user)    
    {
        return $this->entity->create($user);
    }
}