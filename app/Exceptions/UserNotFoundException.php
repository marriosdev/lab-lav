<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'Task not found'
        ], 404);
    }
}
