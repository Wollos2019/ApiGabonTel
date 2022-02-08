<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user -> createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response ($response, 201);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->successResponse( $success,200);
        }
        else{
            return $this->errorResponse('Unauthorised',403);
        }
    }

    public function logout (Request $request) {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
