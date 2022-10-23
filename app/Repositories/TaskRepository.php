<?php

namespace App\Repositories;

use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @var \App\Models\Task $entity
     */
    protected  Task $entity;

    /**
     * @param \App\Models\Task $task
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
     * @return \Illuminate\Support\Collection<Task>
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
     * @param int $userid
     * @return bool
     */
    public function destroy(int $id, int $userId)
    {
        return $this->entity->where("user_id", $userId)
                ->where("id", $id)
                ->delete();
    }

    /**
     * @param int $id
     * @param array $task
     * @param int $userId
     * @return bool
     */
    public function update(int $id, Array $task, int $userId)
    {
        if($this->entity->find($id) == NULl) {
            return false;
        }
        return $this->entity->where("id", $id)            
                ->where("user_id", $userId)
                ->update($task);
    }

    /**
     * @param array $task
     * @return bool
     */
    public function create(array $task)    
    {
        // dd($task);
        return $this->entity->create($task);
    }

    /**
     * Get Task by id
     * 
     * @param int $id
     * @param int $userId
     * @return Task
     */
    public function findByIdTaskUser(int $id, int $userId)
    {
        return $this->entity->where("id", $id)
            ->where("user_id", $userId)
            ->with("user")
            ->with("status")
            ->first();
    }

    /**
     * find all tasks
     * @param int $userId
     * @return \Illuminate\Support\Collection<Task>
     */
    public function findAllTaskUser(int $userId)
    {
        return $this->entity->where("deleted_at", NULL)
            ->where("user_id", $userId)
            ->with("user")
            ->with("status")
            ->get();
    }
}