<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\MaintenanceVehicule;
use Illuminate\Http\Request;

class MaintenanceVehiculeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(MaintenanceVehicule::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'dateEntretien'=>'required',
            'cout'=>'required',
            'nextDateEntretien'=>'required',
            'kilometrageEntretien'=>'required',
            'kilometrageNextEntretien'=>'required',
            'quantiteTypeEntretien'=>'required',
            'vehiculeId'=>'required',
            'fournisseurId'=>'required',
            'typeEntretienId'=>'required',



        ];
        $this->validate($request,$data);
        $maint= new MaintenanceVehicule($request->all());

        if ($maint->save()){
            return $this->showOne($maint);
        }else{
            return $this->errorResponse("store fails",'404');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceVehicule $maintenanceVehicule)
    {
        return $this->showOne($maintenanceVehicule);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenanceVehicule $maintenanceVehicule)
    {
        $mai=[
            $maintenanceVehicule->dateEntretien = $request->dateEntretien,
            $maintenanceVehicule->cout = $request->cout,
            $maintenanceVehicule->nextDateEntretien = $request->nextDateEntretien,
            $maintenanceVehicule->kilometrageEntretien = $request->kilometrageEntretien,
            $maintenanceVehicule->kilometrageNextEntretien = $request->kilometrageNextEntretien,
            $maintenanceVehicule->quantiteTypeEntretien = $request->quantiteTypeEntretien,
            $maintenanceVehicule->vehiculeId = $request->vehiculeId,
            $maintenanceVehicule->fournisseurId = $request->fournisseurId,
            $maintenanceVehicule->typeEntretienId = $request->typeEntretienId,


        ];
        $this->validate($request,$mai);

        $data=$request->all();
        if ($maintenanceVehicule->update($data)){
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
    public function destroy(MaintenanceVehicule $maintenanceVehicule)
    {
        if ($maintenanceVehicule->delete()){
            return $this->successResponse('delete with success',200);

        }else{
            return $this->errorResponse('delete fails ',404);
        }
    }
}
