<?php

namespace App\Http\Controllers\Vehicule;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Vehicule\CategoryPermit;
use Illuminate\Http\Request;

class CategoryPermitController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(CategoryPermit::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $categoriePermis=[
            'libelle'=>'required'
        ];
        $this->validate($request,$categoriePermis);

        $v= new CategoryPermit($request->all());

        if($v->save()){
            return $this->showOne($v);
        }else{
            return $this->errorResponse("message",500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(CategoryPermit $categoryPermits)
    {
        //return $this->showOne($categoriePermis);
        return $this->showOne($categoryPermits);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryPermit $categoryPermit)
    {

        $categoryPermit->libelle = $request->libelle;

        if ($categoryPermit->update()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryPermit $categoryPermit)
    {

        if ($categoryPermit->delete()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error delete',500);
        }
    }
}
