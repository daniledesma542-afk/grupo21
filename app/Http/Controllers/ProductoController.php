<?php

namespace App\Http\Controllers;

use App\Models\Producto; 
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
            $categoriaId = $request->input('categoria_id');

            $query = Producto::whereNull('deleted_at');

            if ($categoriaId) {
                $query->where('categoria_id', $categoriaId);
            }

            $productos = $query->get();

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
    // Solo productos activos (no eliminados lógicamente)
    $productos = Producto::whereNull('deleted_at')->get();

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

    // Función para mostrar un solo producto en la vista del cliente
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        
        return view('detalle_producto', compact('producto'));
    }
}