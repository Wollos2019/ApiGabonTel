<?php

use App\Http\Controllers\Config\DepartmentController;
use App\Http\Controllers\Config\SessionController;
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



Route::apiResource('departments',DepartmentController::class);
Route::apiResource('departments.employees',\App\Http\Controllers\Config\Department\DepartmentEmployeeController::class);
Route::apiResource('fonctions',\App\Http\Controllers\Config\FonctionController::class);
Route::apiResource('working_days',\App\Http\Controllers\Config\WorkingDayController::class);
Route::apiResource('civilities',\App\Http\Controllers\Config\CivilityController::class);
Route::apiResource('countries',\App\Http\Controllers\Config\CountryController::class);
Route::apiResource('regions',\App\Http\Controllers\Config\RegionController::class);
Route::apiResource('holidays',\App\Http\Controllers\Config\HolidayController::class);
Route::apiResource('sessions',SessionController::class);
Route::apiResource('absences',\App\Http\Controllers\Config\AbsenceController::class);
Route::get('/sessions/{year}/year', [SessionController::class, 'sessionByYear']);
