<?php

namespace App\Http\Controllers;

use App\Models\VentaCabecera;
use Illuminate\Http\Request;

class PedidoAdminController extends Controller
{
    public function index()
    {
        $pedidos = VentaCabecera::with('usuario')
            ->where('estado', '!=', 'carrito')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.admin.pedidos', compact('pedidos'));
    }

    public function show($id)
    {
    $pedido = VentaCabecera::with(['usuario', 'detalles.producto'])
        ->findOrFail($id);

    return view('backend.admin.detalle-pedido', compact('pedido'));
    }
}