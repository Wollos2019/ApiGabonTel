<?php

namespace App\Http\Controllers\Vehicule;

use App\Http\Controllers\ApiController;

use App\Models\Vehicule\Permit;
use App\Models\Vehicule\CategoryPermit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PermitController extends ApiController
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
    public function store(Request $request, Permit $permit)
    {
        $rules=[
            'numeroPermis'=>'required',
            'dateAcquisition'=>'required',
            'userId'=>'required',
            'categorie_permis_id'=>''



        ];
        $this->validate($request,$rules);

        $permit= new Permit($request->all());

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



        if($permit->save()){
            foreach ($request->categories as $value){
                $permit->categoryPermit()->attach([
                    'categorie_permis_id'=>$value['categorie_permis_id'],
                    'numeroDossierPermis' => $value['numeroDossierPermis'],
                    'typeCategoriePermis' => $value['typeCategoriePermis'],
                    'dateDebutPermis' => $value['dateDebutPermis'],
                    'dateFinPermis' => $value['dateFinPermis']]);

            }
            //foreach ($request->categories as $value){
//            $permit->categoryPermit()->attach($permit->id,[
//                'categorie_permis_id'=>$request->categorie_permis_id,
//                'numeroDossierPermis' => $request->numeroDossierPermis,
//                'typeCategoriePermis' => $request->typeCategoriePermis,
//                'dateDebutPermis' => $request->dateDebutPermis,
//                'dateFinPermis' => $request->dateFinPermis]);

            // }

//            return $this->successResponse($permit,201);
//            return $this->showOne($permit);
//        }else{
//            return $this->errorResponse('Error saved',500);
//        }

    }


        return $this->showOne($permit);

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
