<?php

namespace App\Http\Controllers;

use App\Models\Producto; // ¡Súper importante para que Laravel sepa de qué tabla hablamos!
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

    // Recibe los datos del formulario y los guarda en la base de datos
    public function store(Request $request)
    {
        // 1. Validamos que no te dejen campos vacíos o pongan letras en el precio
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // 2. Guardamos el producto en la tabla
        Producto::create($request->all());

        // 3. Volvemos al panel con un mensajito de éxito
        return redirect('/admin')->with('success', '¡Producto cargado exitosamente!');
    }

    // Elimina un producto de la base de datos
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->with('success', 'Producto eliminado correctamente.');
    }
}