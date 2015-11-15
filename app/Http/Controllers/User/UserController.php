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
        $verhuurd = DB::table('parkeerplaatsen')->get();
        $gehuurd = DB::table('parkeerplaatsen')->get();
        $aanvragen = DB::table('parkeerplaatsen')->get();

        return view('profile/profile' , ['gehuurd' => $gehuurd , 'verhuurd' => $verhuurd , 'aanvragen' => $aanvragen]);
    }
}
