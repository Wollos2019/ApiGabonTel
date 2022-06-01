<?php

namespace App\Http\Controllers\Panne;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Panne;
use Illuminate\Http\Request;

class PanneController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(Panne::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pan =[
            'libellePanne'=>'required',
            'descriptionPanne'=>'required',
            'dateDebutPanne'=>'required',
            'dateFinPanne'=>'required',
            'coutMainOeuvre'=>'required',
            'factureMainOeuvre'=>'required',
            'vehiculeId'=>'required',

        ];

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
