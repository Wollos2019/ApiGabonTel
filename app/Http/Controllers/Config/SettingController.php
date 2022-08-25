<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Models\RolesPermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll(RolesPermissions::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'roleName' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try{

            $roles = RolesPermissions::where('permissions_name', '=', $request->roleName)->first();
            if ($roles === null)
            {
                // roles name doesn't exist
                $role = new RolesPermissions;
                $role->permissions_name = $request->roleName;
                $role->save();
            }else{

                // roles name exits
                DB::rollback();
                return $this->errorResponse("Roles name exits ",404);


            }

            DB::commit();
            return $this->successResponse('Create new role successfully :)',201);


        }catch(\Exception $e){
            DB::rollback();
            return $this->errorResponse("Add Role fail ",404);


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
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $id        = $request->id;
            $roleName  = $request->roleName;

            $update = [
                'id'               => $id,
                'permissions_name' => $roleName,
            ];

            RolesPermissions::where('id',$id)->update($update);
            DB::commit();
            return $this->successResponse("Role Name updated successfully ",200);


        }catch(\Exception $e){
            DB::rollback();
            return $this->errorResponse("Role Name update fail",404);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id,Request $request)
    {
        try{
            RolesPermissions::destroy($request->id);
            return $this->successResponse("Role Name deleted successfully",200);


        }catch(\Exception $e){
            DB::rollback();
            return $this->errorResponse("Role Name delete fail",404);

        }
    }
}
