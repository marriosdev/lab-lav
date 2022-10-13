<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function resetToken()
    {
        
    }

    public function getToken() 
    {
        $user = Auth::attempt(["email"=>"edmario@live.com", "password"=>"senha12345"]);
        if($user) {
            $user = User::find(Auth::user()->id);
            return Response()->json($user->createToken("session_token")->accessToken);
        }
    }
}
