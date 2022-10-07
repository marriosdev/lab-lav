<?php

namespace App\Exceptions;

use Exception;

class TaskNotFoundException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'Task not found',
        ], 404);    
    }
}
