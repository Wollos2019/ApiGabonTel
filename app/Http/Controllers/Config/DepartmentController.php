<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $departments=Department::all();
        return $this->showAll($departments);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $department=new Department($request->all());

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
    public function show(Department $department)
    {
        return  $this->showOne($department);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Department $department)
    {
        $department->name=$request->name;
        $department->description=$request->description;
        $department->status=$request->status;

        if ($department->save()){
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
    public function destroy(Department $department)
    {
        if($department->delete()){
            return $this->successResponse('deleted success',200);
        }else{
            return $this->errorResponse('Error deleted',500);
        }
    }
}
