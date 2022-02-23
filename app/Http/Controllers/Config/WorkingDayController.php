<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\workingDay;
use Illuminate\Http\Request;

class WorkingDayController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
      return $this->successResponse(workingDay::all(),200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workings=workingDay::all();
        return  $request->days;
        foreach ($workings as $key => $value){
            foreach ($request->days as $key => $day){
                if($value['id']==$day){
                    $value['status']=1;
                    $value->save();
                }else{
                    $value['status']=0;
                    $value->save();
                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, workingDay $workingDay)
    {
        $workingDay->day=$request->day;
        $workingDay->status=$request->status;

        if ($workingDay->save()){
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
    public function destroy($id)
    {
        //
    }
}
