<?php

namespace App\Http\Controllers\Fournisseur;

use App\Http\Controllers\ApiController;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll(Vendor::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request )
    {
        $rules=[
            'libelleFournisseur'=>'required',
            'telephone1'=>'required',
            'telephone2'=>'required',
            'addressFournisseur'=>'required',

        ];
       // $this->validate($request,$rules);
        $this->validate($request,$rules);

        $fo= new Vendor($request->all());

        if($fo->save()){
            return $this->showOne($fo);
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
    public function show(Vendor $vendor)
    {
        return $this->showOne($vendor);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Vendor $vendor)
    {
        $vendor->libelleFournisseur = $request->libelleFournisseur;
        $vendor->telephone1 = $request->telephone1;
        $vendor->telephone2 = $request->telephone2;
        $vendor->addressFournisseur = $request->addressFournisseur;


        if ($vendor->update()){
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
    public function destroy(Vendor $vendor)
    {
        if ($vendor->delete()){
            return $this->successResponse('delete success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }
}
