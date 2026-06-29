<?php

namespace App\Http\Controllers;

use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
   public function confirmar()
    {
        $carrito = $this->obtenerCarrito();

        // 1. Verificación inicial: ¿El carrito tiene algo?
        if ($carrito->detalles()->count() === 0) {
            return back()->with('error', 'Tu carrito está vacío.');
        }

        $items = $carrito->detalles()->with('producto')->get();
        $total = $carrito->total;

        // 2. Usamos una Transacción para asegurar la integridad de la base de datos
        return \Illuminate\Support\Facades\DB::transaction(function () use ($carrito, $items, $total) {
            
            // Validar stock de todos los productos antes de descontar nada
            foreach ($items as $item) {
                $producto = $item->producto;

                if (!$producto || $producto->deleted_at) {
                    throw new \Exception('Uno de los productos ya no está disponible.');
                }

                if ($producto->stock < $item->cantidad) {
                    throw new \Exception('Uno de los productos ya no tiene stock suficiente.');
                }

                // Descontar stock
                $producto->stock -= $item->cantidad;
                $producto->save();
            }

            // Cambiar estado del carrito a venta finalizada
            $carrito->update([
                'estado' => 'pendiente_pago',
                'fecha_venta' => now(),
            ]);

            // Preparar datos para la vista de confirmación
            $itemsParaVista = $items->map(function ($item) {
                return [
                    'nombre' => $item->producto->nombre,
                    'cantidad' => $item->cantidad,
                    'subtotal' => $item->subtotal,
                ];
            });

            // Guardar en sesión para el ticket
            session()->put('ticket_items', $itemsParaVista);
            session()->put('ticket_total', $total);

            return redirect()->route('compra.confirmada')
                ->with('items', $itemsParaVista)
                ->with('total', $total);
        });
    }

    public function descargarTicket()
    {
        $items = session('ticket_items', []);
        $total = session('ticket_total', 0);

        $pdf = Pdf::loadView('ticket_pdf', compact('items', 'total'));

        return $pdf->download('ticket_ondas_de_sanacion.pdf');
    }
}
