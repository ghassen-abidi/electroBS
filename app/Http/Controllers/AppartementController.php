<?php

namespace App\Http\Controllers;

use App\Models\appartement;
use Illuminate\Http\Request;

class AppartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all appartement 
        $appartements = appartement::all();
        return response()->json($appartements);
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
        //create appartements
        $appartement = new appartement();
        $appartement->numero = $request->numero;
        $appartement->description = $request->description;
        $appartement->prix = $request->prix;
        $appartement->etage = $request->etage;
        $appartement->parking = $request->parking;
        $appartement->immeuble_id = $request->immeuble_id;
        $appartement->save();
        return response()->json($appartement);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function show(appartement $appartement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function edit(appartement $appartement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appartement $appartement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function destroy(appartement $appartement)
    {
        //
    }
}
