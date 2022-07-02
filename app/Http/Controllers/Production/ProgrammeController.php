<?php

namespace App\Http\Controllers\Production;

use App\Models\Production\Conducteur;
use App\Http\Controllers\Controller;
use App\Models\Production\Programme;
use App\Http\Controllers\Production\ConducteurController;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Programme::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['heure_debut' => 'required',
                                'date' => 'required',
                                'duree' => 'required'
    ]);
        return Programme::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Production\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Production\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme $programme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Production\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        //
    }

    public function search($heure_debut)
    {
        return Programme::where('heure_debut','>=', '%'.$heure_debut.'%')->get();
    }
}
