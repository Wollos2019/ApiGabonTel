<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Models\commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return commande::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([//'date' => 'required',
                                'contenu' => 'required',
                                'idClient' => 'required'
    ]);
        return commande::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(commande $commande)
    {
        //
    }
}
