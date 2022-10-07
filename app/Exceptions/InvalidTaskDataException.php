<?php

namespace App\Exceptions;

use Exception;

class InvalidTaskDataException extends Exception
{
    public $message;

    public function __construct(Mixed $message)
    {
        $this->message = json_encode($message);
    }

    public function render() {
        return response($this->message, 400);    
    }
}
