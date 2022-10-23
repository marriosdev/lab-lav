<?php

namespace App\Services\Auth;

use App\Exceptions\UnauthorizedException;
use App\Utils\JWTUtils;

class LoginService
{
    public function execute(Array $credentials)
    {
        if (! $token = auth()->attempt($credentials)) {
            throw new UnauthorizedException();
        }
        return JWTUtils::makeToken($token);
    }
}