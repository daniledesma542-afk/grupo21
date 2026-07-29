<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
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

    public function adminIndex()
    {
        $productos = Producto::with('categoria')->orderBy('nombre')->get();
        return view('backend.productos', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('backend.crear_productos', compact('categorias'));
    }

    /**
     * LÓGICA DE GUARDADO (ALTA) CON VALIDACIÓN DIRECTA Y EN ESPAÑOL
     */
    public function store(Request $request)
    {
        $reglas = [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'string'   => 'El campo :attribute debe ser texto.',
            'max'      => 'El campo :attribute no debe superar los :max caracteres.',
            'numeric'  => 'El campo :attribute debe ser un número (puede usar decimales).',
            'integer'  => 'El campo :attribute debe ser un número entero (sin decimales).',
            'min'      => 'El valor de :attribute no puede ser menor a :min.',
            'exists'   => 'La :attribute seleccionada no es válida.',
            'image'    => 'El archivo seleccionado debe ser una imagen.',
            'mimes'    => 'La imagen debe ser de formato: :values.',
        ];

        $atributos = [
            'nombre' => 'nombre del producto',
            'descripcion' => 'descripción',
            'precio' => 'precio de venta',
            'stock' => 'cantidad de stock',
            'categoria_id' => 'categoría',
            'imagen' => 'foto del producto',
        ];

        // 1. Ejecutamos la validación
        $request->validate($reglas, $mensajes, $atributos);

        // 2. Procesamiento y guardado
        $nombreImagen = null;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('img/fotos-productos'), $nombreImagen);
            $nombreImagen = 'img/fotos-productos/' . $nombreImagen;
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
            'imagen' => $nombreImagen,
        ]);

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto guardado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::orderBy('nombre')->get();

        return view('backend.editar_productos', compact('producto', 'categorias'));
    }

    /**
     * LÓGICA DE ACTUALIZACIÓN (EDICIÓN) CON VALIDACIÓN DIRECTA Y EN ESPAÑOL
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $reglas = [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'string'   => 'El campo :attribute debe ser texto.',
            'max'      => 'El campo :attribute no debe superar los :max caracteres.',
            'numeric'  => 'El campo :attribute debe ser un número (puede usar decimales).',
            'integer'  => 'El campo :attribute debe ser un número entero (sin decimales).',
            'min'      => 'El valor de :attribute no puede ser menor a :min.',
            'exists'   => 'La :attribute seleccionada no es válida.',
            'image'    => 'El archivo seleccionado debe ser una imagen.',
            'mimes'    => 'La imagen debe ser de formato: :values.',
        ];

        $atributos = [
            'nombre' => 'nombre del producto',
            'descripcion' => 'descripción',
            'precio' => 'precio de venta',
            'stock' => 'cantidad de stock',
            'categoria_id' => 'categoría',
            'imagen' => 'foto del producto',
        ];

        // 1. Ejecutamos la validación
        $request->validate($reglas, $mensajes, $atributos);

        // 2. Preparamos los datos básicos
        $datos = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
        ];

        // 3. Procesamos la imagen solo si subieron una nueva
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

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return back()->with('success', 'Producto dado de baja correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return view('detalle_producto', compact('producto'));
    }
}