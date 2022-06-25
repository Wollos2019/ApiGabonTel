<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Production\trancheHoController;
use App\http\Controllers\Commercial\CommandeController;
use App\Http\Controllers\Production\ConducteurController;
use App\Http\Controllers\Production\ProgrammeController;

Route::apiResources([
    'trancheHoraires' => trancheHoController::class,
    'conducteurs' => ConducteurController::class,
    'programmes' => ProgrammeController::class
]);

//Route pour les commandes à evaluer
Route::get('/evaluatedC', [CommandeController::class,'evaluatedC']);
Route::get('/searchTime', [ProgrammeController::class,'search']);
Route::get('/checkConducteur/{date}', [ConducteurController::class,'checkConducteur']);