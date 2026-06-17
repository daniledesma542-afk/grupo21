<?php

namespace App\Http\Controllers;

use App\Models\VentaCabecera;
use Illuminate\Http\Request;

class PedidoAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = VentaCabecera::with('usuario')
            ->where('estado', '!=', 'carrito');

        // FILTRO POR ESTADO
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // FILTRO POR CLIENTE
        if ($request->filled('cliente')) {
            $query->whereHas('usuario', function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->cliente . '%');
            });
        }

        // FILTRO POR FECHA
        if ($request->filled('fecha')) {
            $query->whereDate('fecha_venta', $request->fecha);
        }

        $pedidos = $query
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