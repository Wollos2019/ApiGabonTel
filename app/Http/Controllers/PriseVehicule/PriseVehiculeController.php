<?php

namespace App\Http\Controllers\PriseVehicule;

use App\Http\Controllers\ApiController;

use App\Models\Vehicule\PriseVehicule;
use Illuminate\Http\Request;

class PriseVehiculeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll(PriseVehicule::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request )
    {
        $priseVehicule=[
            'objetPriseVehicule'=>"required",
            'datePriseVehicule'=>"required",
            'heurePriseVehicule'=>"required",
            'idVehicule'=>"required",

        ];
        $this->validate($request,$priseVehicule);

        $pv= new PriseVehicule($request->all());

        if($pv->save()){
            return $this->showOne($pv);
        }else{
            return $this->errorResponse("message",500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param PriseVehicule $priseVehicule
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(PriseVehicule $priseVehicule)
    {
        return $this->showOne($priseVehicule);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, PriseVehicule $priseVehicule)
    {

            $priseVehicule->objetPriseVehicule=$request->objetPriseVehicule;
            $priseVehicule->datePriseVehicule=$request->datePriseVehicule;
            $priseVehicule->heurePriseVehicule=$request->heurePriseVehicule;
            //$priseVehicule->idVehicule=$request->objetPriseVehicule,


        if($priseVehicule->update()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(PriseVehicule $priseVehicule)
    {
        if($priseVehicule->delete()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }

    }
}
