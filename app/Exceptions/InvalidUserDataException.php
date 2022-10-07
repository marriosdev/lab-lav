<?php

namespace App\Exceptions;

use Exception;

class InvalidUserDataException extends Exception
{
    public $message;

    public function __construct(Array $message)
    {
        $this->message = $message;
    }

    public function render() {
        return response()->json([
            'message' => $this->message,
        ], 400);    
    }
}
