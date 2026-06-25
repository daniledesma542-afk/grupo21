<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Catálogo público de productos
    public function index(Request $request)
    {
        $query = Producto::with('categoria');

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }

        $productos = $query->orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();

        return view('productos', compact('productos', 'categorias'));
    }

    // Lista exclusiva para el administrador
    public function adminIndex()
    {
        $productos = Producto::with('categoria')
            ->orderBy('nombre')
            ->get();

        return view('backend.productos', compact('productos'));
    }

    // Formulario para cargar producto
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('backend.crear_productos', compact('categorias'));
    }

    // Guarda producto nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'nullable|exists:categorias,id',
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
            'categoria_id' => $request->categoria_id,
            'imagen' => 'img/fotos-productos/' . $nombreImagen,
        ]);

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto guardado correctamente');
    }

    // Formulario edición
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::orderBy('nombre')->get();

        return view('backend.editar_productos', compact('producto', 'categorias'));
    }

    // Actualiza producto
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'nullable|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $datos = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
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

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    // Baja lógica
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->with('success', 'Producto dado de baja correctamente.');
    }

    // Detalle individual del producto
    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);

        return view('detalle_producto', compact('producto'));
    }
}