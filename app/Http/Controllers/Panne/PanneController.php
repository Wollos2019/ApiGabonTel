<?php

namespace App\Http\Controllers\Panne;

use App\Http\Controllers\ApiController;
use App\Models\Panne;
use Illuminate\Http\Request;

class PanneController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll(Panne::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Panne $panne)
    {
        $pan =[
            'libellePanne'=>'required',
            'descriptionPanne'=>'required',
            'dateDebutPanne'=>'required',
            'dateFinPanne'=>'required',
            'coutMainOeuvre'=>'required',
            'factureMainOeuvre'=>'required',
            'vehiculeId'=>'required',

        ];


        $this->validate($request,$pan);
        $panne= new Panne($request->all());

        $re= Panne::where(
        [   'vehiculeId'=>$request->vehiculeId,
            'libellePanne'=>$request->libellePanne,
            'descriptionPanne'=>$request->descriptionPanne,
            'dateDebutPanne'=>$request->dateDebutPanne,
            'dateFinPanne'=>$request->dateFinPanne,
            'coutMainOeuvre'=>$request->coutMainOeuvre,
            'factureMainOeuvre'=>$request->factureMainOeuvre,
            ])->first();



        if($re){
            return $this->successResponse('exist');
        }
        if($panne->save()){

            foreach ($request->factures as $value){

                $panne->vendor()->attach($panne->id,[
                'fournisseurId'=>$value['fournisseurId'],
                    //'vehiculeId'=>$value['vehiculeId'],
                  'facture'=>$value['facture'],
                  'coutPiece'=>$value['coutPiece']


                    ]);

            }

        }
        return $this->showOne($panne);
    }


    public function searchPanne(Request $request){
        $query = Panne::query();
        $data = $request->input('searchPanne');
        if ($data){
            $query->whereRaw("libellePanne LIKE '%".$data."%'")
            ->orWhereRaw("descriptionPanne LIKE '%".$data."%'");
        }
        return $query->get();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Panne $panne)
    {
        return $this->showOne($panne);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Panne $panne)
    {
        $rules=[
            $panne->libellePanne=$request->libellePanne,
        $panne->descriptionPanne=$request->descriptionPanne,
        $panne->dateDebutPanne=$request->dateDebutPanne,
        $panne->coutMainOeuvre=$request->coutMainOeuvre,
        $panne->factureMainOeuvre=$request->factureMainOeuvre,
        $panne->vehiculeId=$request->vehiculeId

        ];

        $this->validate($request,$rules);
        $data= $request->all();

            $panne->update($data);
            //dd($panne);
          // $panne->vendor()->detach($panne->id);
       // $panne->vendor()->syncWithoutDetaching();
            if($request->factures){

                //dd($request->factures);
                foreach ($request->factures as $key => $value){

//                   $panne->vendor()->detach($value['fournisseurId']);
//                    $panne->vendor()->attach([
//                        'fournisseurId'=>$value['fournisseurId'],
//                        'facture'=>$value['facture'],
//                        'coutPiece'=>$value['coutPiece']
//
//                    ]);

                   $panne->vendor()->detach($value['fournisseurId']);
                    $panne->vendor()->attach($value['fournisseurId'],[
                        'fournisseurId'=>$value['fournisseurId'],
                        'facture'=>$value['facture'],
                        'coutPiece'=>$value['coutPiece']

                    ]);
                }
                return $this->showOne($panne);
            }
//        if ($panne->update()){
//            return  $this->successResponse('update success',200);
//        }else{
//            return  $this->errorResponse('update fail',404);
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Panne $panne)
    {
        if ($panne->delete()){
            return $this->successResponse('delete success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
    }
}
