<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use App\Models\trancheHoraire;
use Illuminate\Http\Request;

class trancheHoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return trancheHoraire::all();
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
     * @param  \App\Models\trancheHoraire  $trancheHoraire
     * @return \Illuminate\Http\Response
     */
    public function show(trancheHoraire $trancheHoraire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\trancheHoraire  $trancheHoraire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trancheHoraire = trancheHoraire::find($id);
        $trancheHoraire->update($request->all());
        return $trancheHoraire;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\trancheHoraire  $trancheHoraire
     * @return \Illuminate\Http\Response
     */
    public function destroy(trancheHoraire $trancheHoraire)
    {
        //
    }
}
