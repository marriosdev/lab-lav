<?php

namespace App\Exceptions;

use DateTime;
use Exception;

class TaskNotFoundException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'Task not found',
        ], 404);    
    }
}
