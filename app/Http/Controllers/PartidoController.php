<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Partido::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $partido = Partido::create([
                'equipo_local_id' => $request->equipo_local_id,
                'equipo_visitante_id' => $request->equipo_visitante_id,
                'goles_local' => $request->goles_local,
                'goles_visitante' => $request->goles_visitante
            ]);

            return response()->json([
                'ok' => true,
                'data' => $partido
            ]);

        } catch (\Throwable $e) {

            return response()->json([
                'ok' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}