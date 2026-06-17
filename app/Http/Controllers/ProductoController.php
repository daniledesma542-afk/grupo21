<?php

namespace App\Http\Controllers;

use App\Models\Producto; 
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        // Si el usuario eligió una categoría, la guardamos en $categoriaId
        $categoriaId = $request->input('categoria_id');

        if ($categoriaId) {
            // Si hay categoría, buscamos solo los productos de esa categoría
            $productos = Producto::where('categoria_id', $categoriaId)->get();
        } else {
            // Si no, mostramos todos los productos como siempre
            $productos = Producto::all();
        }

        return view('productos', compact('productos'));
    }

    /// NUEVA FUNCIÓN: Lista exclusiva para el Administrador
    public function adminIndex()
    {
        // Traemos todos los productos de la base de datos
        $productos = Producto::all();

        // Nota: Si tu archivo se llama de otra forma (ej: lista_productos), 
        // cambiá 'backend.productos' por el nombre correcto.
        return view('backend.productos', compact('productos'));
    }

    // Muestra el formulario vacío para cargar un producto nuevo
    public function create()
    {
        return view('backend.crear_productos'); 
    }

    public function catalogo()
    {
        $productos = Producto::all();

        return view('productos', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $imagen->move(public_path('img/fotos-productos'), $nombreImagen);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagen' => 'img/fotos-productos/' . $nombreImagen,
        ]);

        return redirect('/admin/productos')
            ->with('success', 'Producto guardado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('backend.editar_productos', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $datos = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
        ];

        if ($request->hasFile('imagen')) {
            if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                unlink(public_path($producto->imagen));
            }

            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('img/fotos-productos'), $nombreImagen);

            $datos['imagen'] = 'img/fotos-productos/' . $nombreImagen;
        }

        $producto->update($datos);

        return redirect('/admin/productos')
            ->with('success', 'Producto actualizado correctamente');
    }

    // Elimina un producto de la base de datos
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->with('success', 'Producto eliminado correctamente.');
    }
}