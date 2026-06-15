<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;

class ClienteController extends Controller
{
    public function panel()
    {
        return view('backend.usuarios.cliente');
    }

    public function pedidos()
    {
        $pedidos = VentaCabecera::where('user_id', auth()->id())
            ->where('estado', '!=', 'carrito')
            ->orderBy('fecha_venta', 'desc')
            ->get();
        return view('backend.usuarios.pedidos', compact('pedidos'));
    }

    public function detallePedido($id)
    {
    $pedido = VentaCabecera::where('user_id', auth()->id())
        ->where('id', $id)
        ->with('detalles.producto')
        ->firstOrFail();

    return view('backend.usuarios.detalle_pedido', compact('pedido'));
    }
}