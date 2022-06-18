<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\MaintenanceVehicule;
use App\Models\TypeMaintenance;
use Illuminate\Http\Request;

class TypeMaintenanceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $this->showAll(TypeMaintenance::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $data=[
            ''=>'required',
            ''=>'required',
            ''=>'required',
            ''=>'required',
            ''=>'required',
            ''=>'required',
            ''=>'required',
            ''=>'required',


        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TypeMaintenance $typeMaintenance)
    {
        return $this->showOne($typeMaintenance);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TypeMaintenance $typeMaintenance)
    {
        $data=[

            ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeMaintenance $typeMaintenance)
    {
        //
    }
}
