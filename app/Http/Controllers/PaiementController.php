<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaiementController extends Controller
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
        //create paiement if not exist for this month
        $paiement = paiement::where('appartement_id', $request->appartement_id)
            ->where('date', Carbon::now()->format('Y-m-d'))
            ->first();
        if ($paiement) {
            return response()->json(['message' => 'paiement already exist for this month'], 400);
        }
        $paiement = new paiement();
        $paiement->date = Carbon::now()->format('Y-m-d');
        $paiement->due_date = Carbon::now()->addMonth()->format('Y-m-d');
        $paiement->appartement_id = $request->appartement_id;
        $paiement->save();
        return response()->json(
            [
                'message' => 'paiement created successfully',
                'paiement' => $paiement
    
             ], 200);
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(paiement $paiement)
    {
        //
    }
}
