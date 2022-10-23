<?php

namespace App\Utils;
class JWTUtils
{
    static function makeToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ];
    }
}
