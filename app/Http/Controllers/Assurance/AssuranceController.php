<?php

namespace App\Http\Controllers\Assurance;

use App\Http\Controllers\ApiController;
use App\Models\Assurance;
use Illuminate\Http\Request;

class AssuranceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll(Assurance::all());




    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request )
    {
        $assurance=[
            'numeroPoliceAssurance'=>"required",
            'dateDebutAssurance'=>"required",
            'dateFinAssurance'=>"required",
            'files'=>"required",


        ];

        $this->validate($request,$assurance);

        $v= new Assurance($request->all());
        if($request->file('files')){
            $v->scanAssurance=  $this->uploadFile($request->file('files'),'assurances',null);
        }



        if($v->save()){
            return $this->showOne($v);
        }else{
            return $this->errorResponse("message",500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Assurance $assurance
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Assurance $assurance)
    {

       $sh= $this->showOne($assurance);
       return $sh;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Assurance $assurance
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Assurance $assurance)
    {
        $assurance->numeroPoliceAssurance = $request->numeroPoliceAssurance;
        $assurance->dateDebutAssurance = $request->dateDebutAssurance;
        $assurance->dateFinAssurance = $request->dateFinAssurance;
        //$assurance->carteGrise = $request->carteGrise;
        $assurance->scanAssurance = $request->scanAssurance;



        if ($assurance->update()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Assurance $assurance
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Assurance $assurance)
    {
        if ($assurance->delete()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }
}
