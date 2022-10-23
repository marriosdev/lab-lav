<?php

namespace App\Services\Auth;

class LogoutService
{
    public function execute()
    {
        auth("api")->logout();
        return ['message' => 'Sucesso!'];
    }
}