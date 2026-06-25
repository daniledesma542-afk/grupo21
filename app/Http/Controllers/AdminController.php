<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\Usuario;

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

    public function usuarios()
    {
        $usuarios = Usuario::with('rol')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.admin.usuarios', compact('usuarios'));
    }

    public function eliminarUsuario($id)
    {
        if ((int) $id === auth()->id()) {
            return back()->with('error', 'No podés eliminar tu propia cuenta de administrador.');
        }

        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}