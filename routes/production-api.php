<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Production\trancheHoController;
use App\http\Controllers\Commercial\CommandeController;

Route::apiResources([
    'trancheHoraires' => trancheHoController::class
]);

Route::get('/evaluatedC', [CommandeController::class,'evaluatedC']);