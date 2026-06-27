<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VentaCabecera;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Reemplaza a tu función actualizarEstado()
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required'
        ]);

        $pedido = VentaCabecera::with('detalles.producto')->findOrFail($id);
        $estadoAnterior = $pedido->estado;
        $nuevoEstado = $request->estado;

        if ($estadoAnterior !== 'cancelado' && $nuevoEstado === 'cancelado') {
            foreach ($pedido->detalles as $detalle) {
                $producto = $detalle->producto;
                if ($producto) {
                    $producto->stock += $detalle->cantidad;
                    $producto->save();
                }
            }
        }

        $pedido->update([
            'estado' => $nuevoEstado
        ]);

        return back()->with('success', 'Estado actualizado correctamente');
    }
}