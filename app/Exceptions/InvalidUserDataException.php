<?php

namespace App\Exceptions;

use Exception;

class InvalidUserDataException extends Exception
{
    public $message;

    public function __construct(Mixed $message)
    {
        $this->message = json_encode(["errors"=>$message]);
    }

    public function render() {
        return response($this->message, 400);    
   
    }
}
