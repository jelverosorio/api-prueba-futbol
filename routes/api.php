<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/equipos', [EquipoController::class, 'index']);
Route::post('/equipos', [EquipoController::class, 'store']);

Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);

Route::get('/partidos', [PartidoController::class, 'index']);
Route::post('/partidos', [PartidoController::class, 'store']);