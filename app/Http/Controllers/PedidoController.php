<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return response()->json($pedidos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'fecha' => 'required|date',
            'estado' => 'required|string|in:pendiente,procesando,enviado,entregado,cancelado',
            'direccion_envio' => 'required|string',
            'metodo_pago' => 'required|string|max:50',
            'total' => 'required|numeric|min:0'
        ]);

        $pedido = Pedido::create($validatedData);
        return response()->json($pedido, 201);
    }

    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return response()->json($pedido);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        
        $validatedData = $request->validate([
            'usuario_id' => 'exists:usuarios,usuario_id',
            'fecha' => 'date',
            'estado' => 'string|in:pendiente,procesando,enviado,entregado,cancelado',
            'direccion_envio' => 'string',
            'metodo_pago' => 'string|max:50',
            'total' => 'numeric|min:0'
        ]);

        $pedido->update($validatedData);
        return response()->json($pedido);
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $pedidos = Pedido::where('usuario_id', $usuario_id)
                        ->orderBy('fecha', 'desc')
                        ->get();
        return response()->json($pedidos);
    }
}
