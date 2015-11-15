<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{

    public function getRegister()
    {
        return view('auth/register');
    }

    public function getProfile()
    {

        return view('profile/profile');
    }
}
