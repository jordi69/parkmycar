<?php

namespace App\Http\Controllers\Parkeer;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Parkeer;
use Auth;
use Input;
use Validator;
use Redirect;
use Session;
use DB;
use Mail;

class ParkeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $Parkeer = new Parkeer;
        $Parkeer->verhuurderid     = Input::get('userid');
        $Parkeer->huurderid    = Auth::user()->id;
        $Parkeer->parkeerplaatsid = Input::get('parkeerid');

        // save our duck
        $Parkeer->save();

        $userobj = DB::table('users')->where('id', Input::get('userid'))->first();

        Mail::send('emails.aanvraag', ['user' => $userobj], function ($m) use ($userobj) {
            $m->to($userobj->email, $userobj->voornaam)->subject('Aanvraag parking!');
            $m->from('admin@parkmycar.com', 'Admin');
        });

        return view('index');
    }

    public function accept()
    {
        //

        $userobj = DB::table('users')->join('parkeren', 'parkeren.huurderid', '=', 'users.id')->where('parkeren.parkeerplaatsid', Input::get('parkeerid'))->first();

        Mail::send('emails.geaccepteerd', ['user' => $userobj], function ($m) use ($userobj) {
            $m->to($userobj->email, $userobj->voornaam)->subject('Parking geaccepteerd!');
            $m->from('admin@parkmycar.com', 'Admin');
        });

        DB::table('parkeren')->where('parkeerplaatsid', Input::get('parkeerid'))->update(['confirmed' => 1]);

        $user = Auth::user()->id;
        $verhuurd = DB::table('parkeerplaatsen')->join('parkeren', 'parkeren.parkeerplaatsid', '=', 'parkeerplaatsen.prkplid')->where('parkeren.verhuurderid', $user)->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','1')->take(9)->get();
        $gehuurd = DB::table('parkeerplaatsen')->join('parkeren', 'parkeren.parkeerplaatsid', '=', 'parkeerplaatsen.prkplid')->where('parkeren.huurderid', $user)->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','1')->take(9)->get();
        $aanvragen = DB::table('parkeerplaatsen')->join('parkeren', 'parkeren.parkeerplaatsid', '=', 'parkeerplaatsen.prkplid')->where('parkeren.verhuurderid', $user)->orderBy('parkeren.created_at','desc')->where('parkeren.confirmed','0')->take(9)->get();

        return view('profile/profile' , ['gehuurd' => $gehuurd , 'verhuurd' => $verhuurd , 'aanvragen' => $aanvragen]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
