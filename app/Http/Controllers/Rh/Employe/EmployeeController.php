<?php

namespace App\Http\Controllers\Rh\Employe;

use App\Http\Controllers\ApiController;
use App\Http\Requests\EmployeeRequest;
use App\Models\Rh\Employee;
use Illuminate\Http\Request;

class EmployeeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
      return $this->showAll(Employee::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmployeeRequest $request)
    {
        $employee=new Employee($request->all());
        $employee->country=$request->countryId;
        $employee->password=bcrypt($request->password);
        $employee->save();
        if ($employee->save()){
            return $this->successResponse($employee,201);
        }else{
            return $this->errorResponse('Error saved',500);
        }
    }

    public function uploadImageEmployee($employeeId, Request $request){

        $employee=Employee::where('id','=',$employeeId)->first();

        $d['photo']= $this->uploadImage($request->file('image'),'employee',$employee);
        $employee->update($d);
        return $this->showOne($employee);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Employee $employee)
    {

       return $this->showOne($employee);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
