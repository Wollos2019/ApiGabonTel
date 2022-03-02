<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
      $absences=Absence::all();
      return $this->showAll($absences);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $absence=new Absence($request->all());

        if ($absence->save()){
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
    public function show(Absence $absence)
    {
        return $this->showOne($absence);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,Absence $absence)
    {
        $absence->title=$request->title;
        $absence->description=$request->description;
        $absence->status=$request->status;
        $absence->type=$request->type;
        $absence->color=$request->color;

        if ($absence->save()){
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
    public function destroy(Absence $absence)
    {
        if($absence->delete()){
            return $this->successResponse('deleted success',200);
        }else{
            return $this->errorResponse('Error deleted',500);
        }
    }
}
