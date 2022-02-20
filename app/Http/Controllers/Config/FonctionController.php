<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Fonction;
use Illuminate\Http\Request;

class FonctionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $fonctions=Fonction::all();
        return $this->showAll($fonctions);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $department=new Fonction($request->all());

        if ($department->save()){
            return $this->successResponse('saved success',201);
        }else{
            return $this->errorResponse('Error saved',500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Fonction $fonction)
    {
        return  $this->showOne($fonction);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Fonction $fonction)
    {
        $fonction->name=$request->name;
        $fonction->description=$request->description;
        $fonction->status=$request->status;

        if ($fonction->save()){
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
    public function destroy(Fonction $fonction)
    {
        if($fonction->delete()){
            return $this->successResponse('deleted success',200);
        }else{
            return $this->errorResponse('Error deleted',500);
        }
    }
}
