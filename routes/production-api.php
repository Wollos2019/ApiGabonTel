<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Production\trancheHoController;

Route::apiResources([
    'trancheHoraires' => trancheHoController::class
]);