<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\UnitMesure;
use Illuminate\Http\Request;

class UnitMesureController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(UnitMesure::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $unit=[
            'symboleUniteMesure'=>'required',
            'libelleUniteMesure'=>'required',


        ];
        $this->validate($request,$unit);

        $raw= new UnitMesure($request->all());

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(UnitMesure $mesure)
    {

        return $this->showOne($mesure);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, UnitMesure $mesure)
    {
        $rules=[
            $mesure->symboleUniteMesure = $request->symboleUniteMesure,
            $mesure->libelleUniteMesure = $request->libelleUniteMesure

        ];

        $this->validate($request,$rules);

        $data=$request->all();
        if ($mesure->update($data)){
            return $this->showOne($data);
        }else{
            return $this->errorResponse('update fails!',404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(UnitMesure $mesure)
    {

        if ($mesure->delete()){
            return $this->successResponse('delete with success',200);

        }else{
            return $this->errorResponse('delete fails ',404);
        }
    }
}
