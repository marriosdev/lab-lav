<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function destroy(int $id);
    public function update(int $id, array $task);
    public function create(array $task);
}