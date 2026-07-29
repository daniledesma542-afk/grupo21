<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }

    /**
     * TRADUCCIÓN DE ATRIBUTOS
     * Convierte los nombres técnicos de la base de datos en palabras amigables
     * para que los mensajes de error globales de Laravel queden perfectos.
     */
    public function attributes()
    {
        return [
            'nombre' => 'nombre del producto',
            'descripcion' => 'descripción',
            'precio' => 'precio de venta',
            'stock' => 'cantidad disponible',
            'categoria_id' => 'categoría',
            'imagen' => 'foto del producto',
        ];
    }
}