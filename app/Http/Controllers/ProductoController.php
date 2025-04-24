<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'categoria' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen_url' => 'nullable|string|max:255',
            'activo' => 'boolean'
        ]);

        $producto = Producto::create($validatedData);
        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        
        $validatedData = $request->validate([
            'nombre' => 'string|max:100',
            'categoria' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string',
            'precio' => 'numeric|min:0',
            'stock' => 'integer|min:0',
            'imagen_url' => 'nullable|string|max:255',
            'activo' => 'boolean'
        ]);

        $producto->update($validatedData);
        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(null, 204);
    }

    public function getByCategoria($categoria)
    {
        $productos = Producto::where('categoria', $categoria)
                           ->where('activo', true)
                           ->get();
        return response()->json($productos);
    }
}
