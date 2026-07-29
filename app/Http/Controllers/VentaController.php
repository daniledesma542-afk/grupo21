<?php

namespace App\Http\Controllers;

use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf; // ¡Faltaba importar esta clase para el ticket PDF!

class VentaController extends Controller
{
    /**
     * FUNCIÓN AUXILIAR (La que faltaba)
     * Busca la venta "abierta" (carrito) del usuario logueado en la base de datos.
     */
    private function obtenerCarrito()
    {
        // Buscamos la cabecera de la venta del usuario actual que todavía esté en estado "carrito"
        $carrito = VentaCabecera::where('user_id', auth()->id())
                                ->where('estado', 'carrito') // *Nota: Si tu compañera usó 'pendiente' o 'abierto', cámbialo aquí
                                ->first();

        // Si por algún error el usuario entra a confirmar pero no tiene carrito, abortamos y lo regresamos
        if (!$carrito) {
            abort(redirect()->back()->with('error', 'Tu carrito no existe o ya fue procesado.'));
        }

        return $carrito;
    }

    /**
     * CONFIRMAR COMPRA
     * Procesa la compra utilizando Transacciones de Base de Datos (ACID).
     */
    public function confirmar()
    {
        // 1. Llamamos a la función auxiliar que ahora sí existe
        $carrito = $this->obtenerCarrito();

        // 2. Verificación inicial: ¿El carrito tiene algo adentro?
        if ($carrito->detalles()->count() === 0) {
            return back()->with('error', 'Tu carrito está vacío.');
        }

        $items = $carrito->detalles()->with('producto')->get();
        $total = $carrito->total;

        // 3. Usamos una Transacción para asegurar la integridad de la base de datos
        // Si ocurre un error descontando stock, Laravel hace un Rollback automático y no guarda NADA.
        return DB::transaction(function () use ($carrito, $items, $total) {
            
            // Validar stock de todos los productos ANTES de descontar nada
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

            // Preparar datos limpios para la vista de confirmación del cliente
            $itemsParaVista = $items->map(function ($item) {
                return [
                    'nombre' => $item->producto->nombre,
                    'cantidad' => $item->cantidad,
                    'subtotal' => $item->subtotal,
                ];
            });

            // Guardar en sesión para poder generar el ticket en la siguiente página
            session()->put('ticket_items', $itemsParaVista);
            session()->put('ticket_total', $total);

            // Redirigimos a la página de éxito
            return redirect()->route('compra.confirmada')
                ->with('items', $itemsParaVista)
                ->with('total', $total);
        });
    }

    /**
     * DESCARGAR TICKET PDF
     * Lee los datos guardados en la sesión temporal y arma un archivo PDF.
     */
    public function descargarTicket()
    {
        $items = session('ticket_items', []);
        $total = session('ticket_total', 0);

        // Renderiza la vista 'ticket_pdf.blade.php' usando la librería DomPDF
        $pdf = Pdf::loadView('ticket_pdf', compact('items', 'total'));

        // Obliga al navegador a descargar el archivo
        return $pdf->download('ticket_ondas_de_sanacion.pdf');
    }
}