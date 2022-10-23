<?php

namespace App\Services\Auth;

class MeService
{
    public function execute()
    {
        return auth("api")->user();
    }
}
