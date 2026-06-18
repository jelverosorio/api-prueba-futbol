<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/equipos-web', function (){
    return view('equipos');
});

Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);