<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Commercial\ClientController;
use App\http\Controllers\Commercial\CommandeController;
use App\Http\Controllers\ProductController;

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

//Route::apiResource('clients', ClientController::class);

Route::middleware('auth:sanctum')->group( function () {
    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/commandes', [CommandeController::class, 'index']);
    Route::post('/commandes', [CommandeController::class, 'store']);
});
