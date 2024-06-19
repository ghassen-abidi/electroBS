<?php

namespace App\Http\Controllers;

use App\Models\immeuble;
use Illuminate\Http\Request;

class ImmeubleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all immeubles
        $immeubles = immeuble::all();
        return response()->json($immeubles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //function to create immeuble
        $immeuble = immeuble::create([
            
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'code_postal' => $request->code_postal,
            'superficie' => $request->superficie,
            'nombre_etage' => $request->nombre_etage,
            'nombre_appartement' => $request->nombre_appartement,
            'user_id' => $request->user_id
        ]);
        return response()->json($immeuble);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function show(immeuble $immeuble,$nom)
    {
        //get immeuble with nom
        $immeuble = immeuble::where('nom',$nom)->get();
        return response()->json($immeuble);
    }
        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function edit(immeuble $immeuble)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, immeuble $immeuble)
    {
        //update immeubles
        $immeuble = immeuble::find($request->id);
        $immeuble->update([
            
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'code_postal' => $request->code_postal,
            'superficie' => $request->superficie,
            'nombre_etage' => $request->nombre_etage,
            'nombre_appartement' => $request->nombre_appartement,
            'user_id' => $request->user_id
        ]);
        return response()->json($immeuble);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //delete immeuble avec la numero de matricule 
    $immeuble = immeuble::find($request->id);
        $immeuble->delete();
        return response()->json('deleted successfully');



    }
}
