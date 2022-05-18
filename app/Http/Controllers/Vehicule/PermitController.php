<?php

namespace App\Http\Controllers\Vehicule;

use App\Http\Controllers\ApiController;

use App\Models\Vehicule\Permit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PermisController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->showAll(Permit::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request, Permit $permis)
    {
        $rules=[
            'numeroPermis'=>'required',
            'dateAcquisition'=>'required',
            'userId'=>'required',
            'categorie_permis_id'=>'required'



        ];
        $this->validate($request,$rules);

        $v= new Permit($request->all());

        $raw = Permit::where(['userId'=>$request->userId,'numeroPermis'=>$request->numeroPermis, 'dateAcquisition'=>$request->dateAcquisition])->first();
//        if($v->save()){
//
//            return $this->showOne($v);
//        }else{
//            return $this->errorResponse("message",500);
//        }
        if($raw){
            return $this->successResponse('exist');
        }

        $catePermis= Permit::create($v);

        if($request->categoriePermis){
            foreach ($request->categoriePermis as $key => $value){
                $catePermis->categoriePermis()->attach($catePermis->id, ['permis_id' => $value],['numeroDossierPermis' => $value],['typeCategoriePermis' => $value],['dateDebutPermis' => $value],['dateFinPermis' => $value],['categorie_permis_id' => $value]);
            }
        }


        return $this->showOne($catePermis);

    }



    /**
     * Display the specified resource.
     *
     * @param Permit $permis
     * @return JsonResponse
     */
    public function show(Permit $permis)
    {

        return $this->showOne($permis);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Permit $permis
     * @return JsonResponse
     */
    public function update(Request $request, Permit $permis)
    {
        $permis->numeroPermis = $request->numeroPermis;
        $permis->dateAcquisition = $request->dateAcquisition;
        $permis->userId = $request->userId;

        if ($permis->update()){

            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error delete',500);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Permit $permits
     * @return JsonResponse
     */
    public function destroy(Permit $permits)
    {
        if ($permits->delete()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }


}
