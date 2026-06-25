<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;

class CarritoController extends Controller
{
    private function obtenerCarrito()
    {
        return VentaCabecera::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'estado' => 'carrito',
            ],
            [
                'total' => 0
            ]
        );
    }

    public function index()
    {
        $carrito = $this->obtenerCarrito();

        $items = $carrito->detalles()
            ->with('producto')
            ->get();

        return view('backend.usuarios.carrito', compact('carrito', 'items'));
    }

    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($producto->deleted_at) {
            return back()->with('error', 'Este producto ya no está disponible.');
        }

        if ($producto->stock <= 0) {
            return back()->with('error', 'Este producto no tiene stock disponible.');
        }

        $carrito = $this->obtenerCarrito();

        $item = $carrito->detalles()
            ->where('producto_id', $producto->id)
            ->first();

        $cantidadActual = $item ? $item->cantidad : 0;
        $cantidadFinal = $cantidadActual + $request->cantidad;

        if ($cantidadFinal > $producto->stock) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        if ($item) {
            $item->cantidad = $cantidadFinal;
            $item->subtotal = $item->cantidad * $item->precio_unitario;
            $item->save();
        } else {
            $carrito->detalles()->create([
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $producto->precio,
                'subtotal' => $producto->precio * $request->cantidad,
            ]);
        }

        $this->recalcularTotal($carrito);

        return redirect()->route('carrito')
            ->with('success', 'Producto agregado al carrito.');
    }

    public function actualizarCantidad(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $carrito = $this->obtenerCarrito();

        $item = $carrito->detalles()
            ->with('producto')
            ->where('id', $id)
            ->firstOrFail();

        $producto = $item->producto;

        if (!$producto || $producto->deleted_at) {
            return back()->with('error', 'Este producto ya no está disponible.');
        }

        if ($request->cantidad > $producto->stock) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        $item->cantidad = $request->cantidad;
        $item->subtotal = $item->cantidad * $item->precio_unitario;
        $item->save();

        $this->recalcularTotal($carrito);

        return back()->with('success', 'Cantidad actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();

        $carrito->detalles()
            ->where('id', $id)
            ->delete();

        $this->recalcularTotal($carrito);

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    public function vaciar()
    {
        $carrito = $this->obtenerCarrito();

        $carrito->detalles()->delete();

        $this->recalcularTotal($carrito);

        return back()->with('success', 'Carrito vaciado correctamente.');
    }

    public function confirmar()
    {
        $carrito = $this->obtenerCarrito();

        if ($carrito->detalles()->count() === 0) {
            return back()->with('error', 'Tu carrito está vacío.');
        }

        $items = $carrito->detalles()
            ->with('producto')
            ->get();

        $total = $carrito->total;

        foreach ($items as $item) {
            $producto = $item->producto;

            if (!$producto || $producto->deleted_at) {
                return back()->with('error', 'Uno de los productos ya no está disponible.');
            }

            if ($producto->stock < $item->cantidad) {
                return back()->with('error', 'Uno de los productos ya no tiene stock suficiente.');
            }

            $producto->stock -= $item->cantidad;
            $producto->save();
        }

        $carrito->update([
            'estado' => 'pendiente_pago',
            'fecha_venta' => now(),
        ]);

        $itemsParaVista = $items->map(function ($item) {
            return [
                'nombre' => $item->producto->nombre,
                'cantidad' => $item->cantidad,
                'subtotal' => $item->subtotal,
            ];
        });

        session()->put('ticket_items', $itemsParaVista);
        session()->put('ticket_total', $total);

        return redirect()->route('compra.confirmada')
            ->with('items', $itemsParaVista)
            ->with('total', $total);
    }

    private function recalcularTotal(VentaCabecera $carrito)
    {
        $total = $carrito->detalles()->sum('subtotal');

        $carrito->update([
            'total' => $total
        ]);
    }

    public function descargarTicket()
    {
        $items = session('ticket_items', []);
        $total = session('ticket_total', 0);

        $pdf = Pdf::loadView('ticket_pdf', compact('items', 'total'));

        return $pdf->download('ticket_ondas_de_sanacion.pdf');
    }
}