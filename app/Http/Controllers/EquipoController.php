<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Equipo::count() >= 4) {
            return response()->json([
                'mensaje' => 'No puede registrar mas de 4 equipos'
            ]);
        }

        $equipo = Equipo::create([
            'nombre' => $request->nombre
        ]);

        return response()->json($equipo);
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
    public function destroy($id)

    {

        $equipo = Equipo::find($id);

        if(!$equipo) {
            return response() ->json([
                'mensaje' => 'No existe']);
        }

        $equipo->delete();

        return response()->json([
            'mensaje' => 'Eliminado']);
    }
}
