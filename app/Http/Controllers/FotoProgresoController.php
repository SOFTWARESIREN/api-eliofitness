<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoProgreso;

class FotoProgresoController extends Controller
{
    public function index()
    {
        $fotos = FotoProgreso::all();
        return response()->json($fotos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'fecha' => 'required|date',
            'url_imagen' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:30',
            'notas' => 'nullable|string'
        ]);

        $foto = FotoProgreso::create($validatedData);
        return response()->json($foto, 201);
    }

    public function show($id)
    {
        $foto = FotoProgreso::findOrFail($id);
        return response()->json($foto);
    }

    public function destroy($id)
    {
        $foto = FotoProgreso::findOrFail($id);
        $foto->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $fotos = FotoProgreso::where('usuario_id', $usuario_id)
                            ->orderBy('fecha', 'desc')
                            ->get();
        return response()->json($fotos);
    }
}
