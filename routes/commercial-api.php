<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Commercial\ClientController;
use App\http\Controllers\Commercial\CommandeController;
use App\http\Controllers\Commercial\ComDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Commercial\FactureController;

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

Route::apiResources([
    'clients' => ClientController::class,
    'products' => ProductController::class,
    'commandes' => CommandeController::class,
    'commandeDetails' => ComDetailsController::class,
    'factures' => FactureController::class
]);

Route::get('/commandeDetails/somme', [ComDetailsController::class, 'productSum']);
Route::get('/searchDet/{id}', [ComDetailsController::class, 'search']);
Route::post('/clients/{clientId}/images', [ClientController::class, 'uploadImageClient']);
Route::get('/historique/commandes',[ClientController::class, 'commande']);
