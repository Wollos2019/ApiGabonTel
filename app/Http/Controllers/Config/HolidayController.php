<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Models\holiday;
use App\Models\Session;
use Illuminate\Http\Request;

class HolidayController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
       $holidays=Holiday::all();
       return $this->showAll($holidays) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
       $session=Session::find($request->sessionId);
       $message='';
     $listHoliDay=  Holiday::tabJoursFeries($session->year);

         foreach ($listHoliDay as $mois => $tab) {
             foreach ($tab as $jour => $fete) {
                 $holiday=new Holiday();
                 $holiday->date=$jour.'/'.$mois.'/'.$session->year;
                 $holiday->name=$fete ;
                 $holiday->sessionId=$request->sessionId;

                    if( $holiday->save()){
                        $message=true;
                    }else{
                        $message=false;
                        break;
                    }

             }
         }
         if ($message==true){
             return $this->successResponse('saved success',201);
         }else{
             return $this->errorResponse('Error saved',500);
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
