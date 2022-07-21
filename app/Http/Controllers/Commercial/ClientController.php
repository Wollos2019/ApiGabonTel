<?php

namespace App\Http\Controllers\Commercial;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Validator;
use App\Models\Client;
use App\Models\commande;

class ClientController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //return $this->showAll(Client::all());
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $client = new Client($request->all());

        // if($client->save()){
        //     return $this->successResponse('Saved successfully', 201);
        // } else {
        //     return $this->errorResponse('Error saved', 500);
        // }

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'email' => 'required'
        ]);
        return Client::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $this->showOne($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $client)
    {
        $client -> $request->all();
        if ($client->update()){
            return $this->successResponse('update success',200);
        }else{
            return $this->errorResponse('Error update',500);
        }
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

    public function uploadImageClient($clientId, Request $request){

        $client=Client::where('id','=',$clientId)->first();

        $d['photo']= $this->uploadImgClient($request->file('image'),'client',$client);
        $client->update($d);
        return $this->showOne($client);

    }

    public function commande ($clientId) {
        //$client=Client::where('id','=',$clientId)->first();
        
        return commande::where('idClient','=',$clientId)->get();
    }
}
