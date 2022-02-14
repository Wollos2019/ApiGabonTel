<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Commercial\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/clients', [ClientController::class, 'index']);
//Route::apiResource('clients', ClientController::class);
//Route::apiResource('clients',\App\Http\Controllers\Config\ClientController::class);
Route::middleware('auth:sanctum')->group( function () {
    //Route::get('/clients', [ClientController::class, 'index']);
});
