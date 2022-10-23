<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'E-mail ou senha inválidos',
        ], 401);    
    }
}