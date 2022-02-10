<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll(Country::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $country=new Country($request->all());

        if ($country->save()){
            return $this->successResponse('saved success',201);
        }else{
            return $this->errorResponse('Error saved',500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return $this->show($country);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Country $country)
    {
        $country->name=$request->name;
        $country->description=$request->description;
        $country->status=$request->status;
        $country->code=$request->code;

        $country->codePhone=$request->codePhone;

        $country->abbreviation1=$request->abbreviation1;
        $country->abbreviation2=$request->abbreviation2;


        if ($country->save()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Country $country)
    {
        if($country->delete()){
            return $this->successResponse('deleted success',200);
        }else{
            return $this->errorResponse('Error deleted',500);
        }
    }
}
