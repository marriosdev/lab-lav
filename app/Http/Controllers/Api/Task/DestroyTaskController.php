<?php

namespace App\Http\Controllers\Api\Task;

use App\Exceptions\{
    TaskNotFoundException
};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyTaskController extends Controller
{
    public function destroy()
    {
        throw new TaskNotFoundException();
    }
}
