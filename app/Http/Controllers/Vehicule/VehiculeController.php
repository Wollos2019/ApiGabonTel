<?php

namespace App\Http\Controllers\Vehicule;

use App\Http\Controllers\ApiController;

use App\Models\Vehicule\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        return $this->showAll(Vehicule::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

    $voitures =[
        'libelleVehicule'=>'required',
        'numeroIdentifiant'=>'required',
        'immatriculation'=>'required',
        'carteGrise'=>'required',
        'nombrePlace'=>'required',
        'longueurVehicule'=>'required',
        'dureeVie'=>'required',
        'dateMiseCirculation'=>'required',
        'delaiAlerte'=>'required',

    ];
    $this->validate($request,$voitures);

    $v= new Vehicule($request->all());

    if($v->save()){
        return $this->showOne($v);
    }else{
        return $this->errorResponse("message",500);
    }

    }

    /**
     * Display the specified resource.
     *
     * @param Vehicule $vehicule
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Vehicule $vehicule)
    {
        return $this->showOne($vehicule);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Vehicule $vehicule
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Vehicule $vehicule)
    {

//        $vehicule->update($request->all());
//        return $vehicule;

        $vehicule->libelleVehicule = $request->libelleVehicule;
        $vehicule->numeroIdentifiant = $request->numeroIdentifiant;
        $vehicule->immatriculation = $request->immatriculation;
        $vehicule->carteGrise = $request->carteGrise;
        $vehicule->nombrePlace = $request->nombrePlace;
        $vehicule->longueurVehicule = $request->longueurVehicule;
        $vehicule->dureeVie = $request->dureeVie;
        $vehicule->dateMiseCirculation = $request->dateMiseCirculation;
        $vehicule->delaiAlerte = $request->delaiAlerte;


        if ($vehicule->update()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vehicule $vehicule
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Vehicule $vehicule)
    {
        if ($vehicule->delete()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }
}
