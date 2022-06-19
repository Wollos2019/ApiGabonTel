<?php

use App\Http\Controllers\Assurance\AssuranceController;
use App\Http\Controllers\Fournisseur\VendorController;
use App\Http\Controllers\Maintenance\MaintenanceVehiculeController;
use App\Http\Controllers\Maintenance\TypeMaintenanceController;
use App\Http\Controllers\Maintenance\UnitMesureController;
use App\Http\Controllers\Panne\PanneController;
use App\Http\Controllers\PriseVehicule\PriseVehiculeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Vehicule\CategoryPermitController;
use App\Http\Controllers\Vehicule\PermitController;
use App\Http\Controllers\Vehicule\VehiculeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::resource('products', ProductController2::class);
//Vehicules routes

Route::resource('vehicules',VehiculeController::class);

//Assurences routes

Route::resource('assurances', AssuranceController::class);

//Prise vehicules routes
Route::resource('prise_vehicules', PriseVehiculeController::class);

// permis routes
Route::resource('permits', PermitController::class,['only' => ['store','show','index','update']]);
Route::delete('/permits/{id}',[PermitController::class,'delete']);



// categorie_permis routes
Route::resource('category_permits', CategoryPermitController::class);

// fournisseurs
Route::resource('vendors', VendorController::class);

//panne
Route::resource('pannes', PanneController::class, ['only' => ['store','show','index','destroy','update']]);

//maintenace vehicule
Route::resource('maintenance_vehicules', MaintenanceVehiculeController::class);

//type entretient
Route::resource('type_entretiens', TypeMaintenanceController::class);

//unit_mesures
Route::resource('unit_mesures', UnitMesureController::class);


//Route::get('images/{filename}',function($filename){
//    $file=\Illuminate\Support\Facades\Storage::get($filename);
//    return response($file,200)->header('Content-Type', 'image/type')
//)}

//Public Routes

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/products/search/{name}', [ProductController::class, 'search']);

    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'delete']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});
Route::apiResource('dashboards',\App\Http\Controllers\Dashboard\DashboardController::class);


