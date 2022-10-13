<?php

namespace App\Repositories\Contracts;

interface TaskRepositoryInterface
{
    public function findById($id);
    public function findAll();
    public function destroy(int $id);
    public function update(int $id, array $task);
    public function create(array $task);
}
