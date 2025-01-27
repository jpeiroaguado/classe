<?php

use App\Http\Controllers\Api\ColeccionController;
use App\Http\Controllers\Api\MarcadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('marcadores', MarcadorController::class);
Route::apiResource('colecicones', ColeccionController::class);
