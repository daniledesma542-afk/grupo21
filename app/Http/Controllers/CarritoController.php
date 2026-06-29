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

        return back()->with('success', '¡Producto agregado al carrito con éxito!');
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


    private function recalcularTotal(VentaCabecera $carrito)
    {
        $total = $carrito->detalles()->sum('subtotal');

        $carrito->update([
            'total' => $total
        ]);
    }

}