<?php

namespace App\Services\Auth;

use App\Utils\JWTUtils;

class RefreshService
{
    public function execute()
    {

        return JWTUtils::makeToken(auth("api")->refresh());
    }
}


