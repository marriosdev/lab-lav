<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function findAll()
    {
        echo "FIND ALL USER";
    }

    public function findById()
    {
        echo "FIND BY ID USER";
    }
}
