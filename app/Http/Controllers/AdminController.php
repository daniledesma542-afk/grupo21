<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }

    public function actualizarEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required'
        ]);

        $pedido = VentaCabecera::with('detalles.producto')->findOrFail($id);

        $estadoAnterior = $pedido->estado;
        $nuevoEstado = $request->estado;

        /*
        Si el pedido NO estaba cancelado
        y ahora pasa a cancelado,
        devolvemos stock
        */
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