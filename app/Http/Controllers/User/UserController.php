<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class UserController extends Controller
{

    public function getRegister()
    {
        return view('auth/register');
    }

    public function getProfile()
    {
        $user = Auth::user()->id;
        $verhuurd = DB::table('parkeerplaatsen')->join('parkeren', 'parkeren.parkeerplaatsid', '=', 'parkeerplaatsen.prkplid')->where('parkeren.verhuurderid', $user)->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','1')->take(3)->get();
        $gehuurd = DB::table('parkeerplaatsen')->join('parkeren', 'parkeren.parkeerplaatsid', '=', 'parkeerplaatsen.prkplid')->where('parkeren.huurderid', $user)->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','1')->take(3)->get();
        $aanvragen = DB::table('parkeerplaatsen')->join('parkeren', 'parkeren.parkeerplaatsid', '=', 'parkeerplaatsen.prkplid')->where('parkeren.verhuurderid', $user)->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','0')->take(3)->get();

        return view('profile/profile' , ['gehuurd' => $gehuurd , 'verhuurd' => $verhuurd , 'aanvragen' => $aanvragen]);
    }

    public function getLogout(){

    if(Auth::check()){

        Auth::logout();
        return view('index');

    }
}
}
