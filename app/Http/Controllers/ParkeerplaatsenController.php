<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
         $validator = Validator::make($request->all(), [
            'prkplstraat' => 'required|max:255',
            'prkplstraatnummer' => 'required',
            'prkplgemeente' => 'required',
            'Prijs' => 'required', //max 2 cijfers na komme
            'BeschikbaarStarttijd' => 'required',
            'BeschikbaarStoptijd' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect('parkeerplaatsen/create') //create van parkeerplaats
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            return Parkeerplaats::create([
                'prkplstraat' => $request['prkplstraat'],
                'prkplstraatnummer' => $request['prkplstraatnummer'],
                'prkplgemeente' => $request['prkplgemeente'],
                'Prijs' => $request['Prijs'],
                'BeschikbaarStarttijd' => $request['BeschikbaarStarttijd'],
                'BeschikbaarStoptijd' => $request['BeschikbaarStoptijd']
            ]);
        }

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
