<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use App\Models\Production\Conducteur;
use Illuminate\Http\Request;

class ConducteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Conducteur::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['date' => 'required'
    ]);
        return Conducteur::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conducteur  $conducteur
     * @return \Illuminate\Http\Response
     */
    public function show(Conducteur $conducteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conducteur  $conducteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conducteur $conducteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conducteur  $conducteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conducteur $conducteur)
    {
        //
    }

    public function checkConducteur($date)
    {
        if(Conducteur::where('date',$date)->count()>0)
        {
            return Conducteur::where('date', $date)->get();
        } else {
            return false;
        };
    }

    public function searchConduc($date1, $date2)
    {
        return Conducteur::whereBetween('date', [$date1, $date2])->orderBy('date','ASC')->get();
    }
}
