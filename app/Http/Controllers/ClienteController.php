<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function descargarTicketHistorial($id)
    {
        // 1. Buscamos el pedido asegurándonos de que sea del cliente logueado
        $pedido = VentaCabecera::where('user_id', auth()->id())
            ->where('id', $id)
            ->with('detalles.producto')
            ->firstOrFail();

        // 2. Formateamos los items para que la vista del PDF los entienda igual que el carrito
        $items = $pedido->detalles->map(function ($detalle) {
            return [
                'nombre' => $detalle->producto->nombre ?? 'Producto eliminado',
                'cantidad' => $detalle->cantidad,
                'subtotal' => $detalle->subtotal,
            ];
        });

        $total = $pedido->total;

        // 3. Generamos el PDF reutilizando tu diseño actual
        $pdf = Pdf::loadView('ticket_pdf', compact('items', 'total'));

        // 4. Descargamos el archivo con el número de pedido en el nombre
        return $pdf->download('ticket_pedido_' . $pedido->id . '.pdf');
    }
}