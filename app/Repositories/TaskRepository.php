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
     * Get Task by id
     * 
     * @param int $id
     * @return Task
     */
    public function findById($id)
    {
        return $this->entity->where("id", $id)
        ->with("user")
        ->first();
    }

    /**
     * find all tasks
     * @return Illuminate\Support\Collection<Task>
     */
    public function findAll()
    {
        return $this->entity->where("deleted_at", NULL)->with("user")->get();
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