<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyUserController extends Controller
{
    public function destroy()
    {
        echo "DELETE USER";
    }
}
