<?php

namespace App\Http\Controllers;

use App\Models\Producto; 
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Muestra la lista de todos los productos (Ideal para tu Panel Admin)
    public function index()
    {
        $productos = Producto::all();
        
        // Acá lo mandamos a tu vista del panel. 
        // Cambiá 'backend.productos' por el nombre exacto de tu archivo Blade si es distinto.
        return view('backend.productos', compact('productos'));
    }

    // Muestra el formulario vacío para cargar un producto nuevo
    public function create()
    {
        return view('backend.crear_producto'); 
    }

   public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'imagen' => 'required|image' 
        ]);

        $rutaImagen = $request->file('imagen')->store('fotos-productos', 'public');

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagen' => $rutaImagen,
        ]);

        return redirect('/admin/productos')->with('mensaje', 'Producto guardado');
    }

    // Elimina un producto de la base de datos
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->with('success', 'Producto eliminado correctamente.');
    }
}