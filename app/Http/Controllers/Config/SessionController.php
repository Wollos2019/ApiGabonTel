<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\ApiController;
use App\Models\Holiday;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sessions=Session::all();
        return $this->showAll($sessions);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * @param $year
     * @return \Illuminate\Http\JsonResponse
     */
    public function sessionByYear($year){
        $session=Session::where('year','=',$year)->first();
        if($session){
            $holiDays=Holiday::where('sessionId','=',$session->id)->get();
            return $this->successResponse($holiDays,200);

        }else{
            return $this->errorResponse('Aucune session trouvée',204);
        }

    }
}
