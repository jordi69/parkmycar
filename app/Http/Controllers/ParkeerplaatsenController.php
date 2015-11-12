<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ParkeerplaatsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parking/overzicht');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('parking/add_parkeerplaats');
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
        DB::table('parkeerplaatsen')->insert([
            'adres' => $request['adres'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'Prijs' => $request['Prijs'],
                'BeschikbaarStartdatum' => $request['BeschikbaarStartdatum'],
                'BeschikbaarStarttijd' => $request['BeschikbaarStarttijd'],
                'BeschikbaarStoptijd' => $request['BeschikbaarStoptijd']
            ]);  

        /*$parkeerplaats = new ParkeerplaatsenController;
        $parkeerplaats->adres =$request['adres'];
        $parkeerplaats->latitude =$request['latitude'];
        $parkeerplaats->longitude =$request['longitude'];
        $parkeerplaats->Prijs =$request['Prijs'];
        $parkeerplaats->BeschikbaarStartdatum =$request['BeschikbaarStartdatum'];
        $parkeerplaats->BeschikbaarStarttijd =$request['BeschikbaarStarttijd'];
        $parkeerplaats->BeschikbaarStoptijd =$request['BeschikbaarStoptijd'];
        $parkeerplaats->save();*/

         /*$validator = Validator::make($request->all(), [
            'adres' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'Prijs' => 'required', //max 2 cijfers na komme
            'BeschikbaarStartdatum' => 'required'
            'BeschikbaarStarttijd' => 'required',
            'BeschikbaarStoptijd' => 'required'

        ]);*/
         

        /*if ($validator->fails()) {
            return redirect('parkeerplaatsen/create') //create van parkeerplaats
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            return DB::table('parkeerplaatsen')->insert([
            'adres' => $request['adres'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'Prijs' => $request['Prijs'],
                'BeschikbaarStartdatum' => $request['BeschikbaarStartdatum'],
                'BeschikbaarStarttijd' => $request['BeschikbaarStarttijd'],
                'BeschikbaarStoptijd' => $request['BeschikbaarStoptijd']
            ]);
        ]);Parkeerplaats::create([
                'adres' => $request['adres'],
                'latitude' => $request['latitude'],
                'longitude' => $request['longitude'],
                'Prijs' => $request['Prijs'],
                'BeschikbaarStartdatum' => $request['BeschikbaarStartdatum'],
                'BeschikbaarStarttijd' => $request['BeschikbaarStarttijd'],
                'BeschikbaarStoptijd' => $request['BeschikbaarStoptijd']
            ]);*/



    return view('layouts/master');
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

    public function search()
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
