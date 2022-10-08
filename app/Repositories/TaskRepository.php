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
     * @param App\Models\Task $task
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
            ->with("status")
            ->first();
    }

    /**
     * find all tasks
     * @return Illuminate\Support\Collection<Task>
     */
    public function findAll()
    {
        return $this->entity->where("deleted_at", NULL)
            ->with("user")
            ->with("status")
            ->get();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id)
    {
        return $this->entity->destroy($id);
    }

    /**
     * @param int $id
     * @param array $task
     * @return bool
     */
    public function update(int $id, Array $task)
    {
        if($this->entity->find($id) == NULl) {
            return false;
        }
        return $this->entity->where("id", $id)->update($task);
    }

    /**
     * @param array $task
     * @return bool
     */
    public function create(array $task)    
    {
        return $this->entity->create($task);
    }
}