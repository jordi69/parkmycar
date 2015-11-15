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
        DB::table('fotos')->join('parke', 'fotos.id', '=', 'winaars.fotoid')->orderBy('winaars.created_at','desc')->take(3)->get();
        $verhuurd = DB::table('parkeerplaatsen')->join('parkeren', 'verhuurder.id', '=', 'parkeerplaatsen.userid')->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','0')->take(3)->get();
        $gehuurd = DB::table('parkeerplaatsen')->join('parkeren', 'huurder.id', '=', 'parkeerplaatsen.userid')->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','0')->take(3)->get();
        $aanvragen = DB::table('parkeerplaatsen')->join('parkeren', 'verhuurder.id', '=', 'parkeerplaatsen.userid')->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','1')->take(3)->get();

        return view('profile/profile' , ['gehuurd' => $gehuurd , 'verhuurd' => $verhuurd , 'aanvragen' => $aanvragen]);
    }
}
