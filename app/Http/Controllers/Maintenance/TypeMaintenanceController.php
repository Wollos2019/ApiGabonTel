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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request )
    {
        $data=[
            'libelleTypeEntretien'=>'required',
            'descriptionTypeEntretien'=>'required',
            'unitMesureId'=>'required',
        ];
        $this->validate($request,$data);

        $raw= new TypeMaintenance($request->all());

        if ($raw->save()){
            return $this->showOne($raw);
        }
        else{
            return $this->errorResponse('store fails!',404);
        }
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
        $type=[
            $typeMaintenance->libelleTypeEntretien = $request->libelleTypeEntretien,
            $typeMaintenance->descriptionTypeEntretien = $request->descriptionTypeEntretien,
            $typeMaintenance->unitMesureId = $request->unitMesureId,

        ];
        $this->validate($request,$type);

        $data=$request->all();
        if ($typeMaintenance->update($data)){
            return $this->showOne($data);
        }else{
            return $this->errorResponse('update fails!',404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeMaintenance $typeMaintenance)
    {
        if($typeMaintenance->delete()){
            return $this->successResponse("delete sucecces",'200');
        }else{
            return $this->errorResponse('delete fails','404');
        }
    }
}
