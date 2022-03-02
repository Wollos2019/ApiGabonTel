<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Models\CommandesDetail;
use Illuminate\Http\Request;

class ComDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CommandesDetail::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['productName' => 'required',
            'quantity' => 'required',
            'idProduct' => 'required',
            'idCommande' => 'required'
        ]);
        return CommandesDetail::create($request->all());
    }

    /**
     * Calculate the sum of all products in order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productSum()
    {
        return CommandesDetail::products();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommandesDetails  $commandesDetails
     * @return \Illuminate\Http\Response
     */
    public function show(CommandesDetails $commandesDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommandesDetails  $commandesDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandesDetails $commandesDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommandesDetails  $commandesDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandesDetails $commandesDetails)
    {
        //
    }
}
