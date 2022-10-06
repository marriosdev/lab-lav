<?php

namespace App\Repositories;

use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @var App\Models\Task $entity
     */
    protected  Task $entity;

    /**
     * 
     */
    public function __construct(Task $task)
    {
        $this->entity = $task;
    }

    /**
     * 
     */
    public function findById($id)
    {
        return $this->entity->findById($id)->get();
    }

    /**
     * 
     */
    public function findAll()
    {
        return $this->entity->all()->get();
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
    public function update(int $id, array $task)
    {
        return $this->entity->update($id, $task);
    }

    /**
     * 
     */
    public function create(array $task)    
    {
        return $this->entity->create($task);
    }
}