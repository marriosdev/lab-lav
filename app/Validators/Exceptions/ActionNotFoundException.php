<?php

namespace App\Validators\Exceptions;

use Exception;

class ActionNotFoundException extends Exception
{
    public function __construct(String $message) {
        parent::__construct($message);
    }
}