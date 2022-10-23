<?php

namespace App\Repositories\Contracts;

interface TaskRepositoryInterface
{
    public function findById($id);
    public function findAll();
    public function destroy(int $id, int $userId);
    public function update(int $id, array $task, int $userId);
    public function create(array $task);
}
