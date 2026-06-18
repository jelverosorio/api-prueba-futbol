<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/equipos-web', function (){
    return view('equipos');
});

Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);