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

        $user = DB::table('users')->where('id','userid')->first();

        Mail::send('emails.aanvraag', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->voornaam)->subject('Aanvraag parking!');
            $m->from('admin@parkmycar.com', 'Admin');
        });

        return view('index');
    }

    public function accept()
    {
        //

        DB::table('users')->join('parkeren', 'parkeren.huurderid', '=', 'users.id')->where('parkeren.prkplid', Input::get('parkeerid'))->first();

        Mail::send('emails.geaccepteerd', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->voornaam)->subject('Parking geaccepteerd!');
            $m->from('admin@parkmycar.com', 'Admin');
        });

        DB::table('parkeren')->where('parkeerplaatsid', Input::get('parkeerid'))->update(['confirmed' => 1]);

        return view('profile/profile');
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
