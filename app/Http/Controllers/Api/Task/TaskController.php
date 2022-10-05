<?php

namespace App\Http\Controllers\Api\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function findAll()
    {
        echo "FIND ALL";
    }

    public function findById()
    {
        echo "FIND BY ID";
    }
}
