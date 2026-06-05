<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\Producto;

class CarritoController extends Controller
{
    // Busca el carrito activo o crea uno nuevo vacío
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

    // Muestra el carrito con todos sus productos
    public function index()
    {
        $carrito = $this->obtenerCarrito();
        // with('producto') evita hacer demasiadas consultas a la base de datos
        $items = $carrito->detalles()->with('producto')->get();
        
        return view('backend.usuarios.carrito', compact('carrito', 'items'));
    }

    // Agrega un producto al carrito
    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // Verificar stock antes de agregar
        if ($producto->stock < $request->cantidad) {
            return back()->with('error', 'No hay suficiente stock');
        }

        $carrito = $this->obtenerCarrito();

        // ¿El producto ya está en el carrito?
        $item = $carrito->detalles()->where('producto_id', $producto->id)->first();

        if ($item) {
            // Si ya existe: suma la cantidad y recalcula el subtotal
            $item->cantidad += $request->cantidad;
            $item->subtotal = $item->cantidad * $item->precio_unitario;
            $item->save();
        } else {
            // Si no existe: crea un nuevo renglón en el detalle
            $carrito->detalles()->create([
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $producto->precio,
                'subtotal' => $producto->precio * $request->cantidad,
            ]);
        }

        // Recalcular el total general del carrito
        $this->recalcularTotal($carrito);

        return back()->with('success', 'Producto agregado al carrito');
    }

    // Quita un producto del carrito
    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();
        
        // where('id', $id) evita eliminar ítems del carrito de otro usuario
        $carrito->detalles()->where('id', $id)->delete();
        
        $this->recalcularTotal($carrito);
        
        return back()->with('success', 'Producto eliminado');
    }

    // Confirma y cierra la compra
    public function confirmar()
    {
        $carrito = $this->obtenerCarrito();
        
        if ($carrito->detalles()->count() === 0) {
            return back()->with('error', 'Tu carrito está vacío');
        }

        $items = $carrito->detalles()->with('producto')->get();
        $total = $carrito->total;

        // Cambia estado y guarda la fecha exacta de la compra
        $carrito->update([
            'estado' => 'confirmado',
            'fecha_venta' => now(),
        ]);

        // Pasa los datos por sesión a la vista de confirmación
        return redirect()->route('compra.confirmada')
            ->with('items', $items)
            ->with('total', $total);
    }

    // Helper privado: recalcula el total sumando los subtotales
    private function recalcularTotal(VentaCabecera $carrito)
    {
        $total = $carrito->detalles()->sum('subtotal');
        $carrito->update(['total' => $total]);
    }
}
