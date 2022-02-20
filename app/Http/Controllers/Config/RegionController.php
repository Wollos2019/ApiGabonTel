<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $regions=Region::all();
        return $this->showAll($regions);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $region=new Region($request->all());

        if ($region->save()){
            return $this->successResponse('saved success',201);
        }else{
            return $this->errorResponse('Error saved',500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        return  $this->showOne($region);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Region $region)
    {
        $region->name=$request->name;
        $region->description=$request->description;
        $region->status=$request->status;

        if ($region->save()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Region $region)
    {
        if($region->delete()){
            return $this->successResponse('deleted success',200);
        }else{
            return $this->errorResponse('Error deleted',500);
        }
    }
}
