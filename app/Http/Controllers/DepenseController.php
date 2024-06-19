<?php

namespace App\Http\Controllers;

use App\Models\depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all 
        $depenses = depense::all();
        return response()->json($depenses);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //create depenses
        $depense = depense::create([
            'montant' => $request->montant,
            'description' => $request->description,
            'type'=>$request->type,
            'date' => $request->date,
            'immeuble_id' => $request->immeuble_id,
        ]);
        return response()->json($depense);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store depenses
        $depense = depense::create([
            'montant' => $request->montant,
            'description' => $request->description,
            'type'=>$request->type,
            'date' => $request->date,
            'immeuble_id' => $request->immeuble_id,
            ]);
            return response()->json($depense);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(depense $depense)
    {
        //
    }
}
