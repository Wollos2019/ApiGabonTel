<?php

namespace App\Http\Controllers\Vehicule;

use App\Http\Controllers\ApiController;

use App\Models\Vehicule\Permit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use function Symfony\Component\Translation\t;

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
    public function delete($id){
        $p=Permit::find($id);
        if($p->delete()){
            return $this->successResponse('sucess',200);

        }else{
            return $this->successResponse('error',500);

        }
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
          //  'category_permit_id'=>'required',





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

    //    return $this->successResponse($request->permiscategories);
       //    dd($request->permiscategories);

        if($permit->save()){
           // dd($request);
           // dd($request->categories);
//            foreach ($request->permiscategories as $value) {
//                $permit->categoryPermit()->attach($permit->id, [
//                    'category_permit_id' => $request->category_permit_id,
//                    'numeroDossierPermis' => $request->numeroDossierPermis,
//                    'typeCategoriePermis' => $request->typeCategoriePermis,
//                    'dateDebutPermis' => $request->dateDebutPermis,
//                    'dateFinPermis' => $request->dateFinPermis]);
//            }
           // dd($request->permiscategories);

            foreach ($request->categories as $value){

                    $permit->categoryPermit()->attach($permit->id,[

                  'category_permit_id'=>$value['category_permit_id'],
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
    public function show(Permit $permit)
    {

        return $this->showOne($permit);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Permit $permis
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, Permit $permit)
    {
        $rules=[
            $permit->numeroPermis = $request->numeroPermis,
        $permit->dateAcquisition = $request->dateAcquisition,
        $permit->userId = $request->userId,
        ];
       // dd($request);
       // $this->validate($request,$rules);

        $data= $request->all();
       // dd($data);

        $permit->update($data);

        if ($request->categories){
            foreach ($request->categories as $key=>$value){
                $permit->categoryPermit()->detach($value['category_permit_id']);
                $permit->categoryPermit()->attach($value['category_permit_id'],[
                    'category_permit_id'=>$value['category_permit_id'],
                    'numeroDossierPermis' => $value['numeroDossierPermis'],
                    'typeCategoriePermis' => $value['typeCategoriePermis'],
                    'dateDebutPermis' => $value['dateDebutPermis'],
                    'dateFinPermis' => $value['dateFinPermis']]);

            }
            return $this->showOne($permit);
        }
//        if ($$request->categories){
//
//            return $this->successResponse('update success',200);
//        }else{
//            return $this->errorResponse('Error delete',500);
//        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Permit $permits
     * @return JsonResponse
     */
//    public function destroy(Permit $permits)
//    {
//        if ($permits->delete()){
//
//            return $this->successResponse('delete successefull',200);
//        }else{
//            return $this->errorResponse('Error of delete',500);
//        }
//    }


}
