<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a hacer esta petición.
     */
    public function authorize(): bool
    {
        return true; // <-- DEBE ESTAR EN TRUE para que funcione
    }

    /**
     * Las reglas de validación.
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'nullable|exists:categorias,id',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }

    /**
     * Mensajes personalizados en español.
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'precio.required' => 'Debes asignar un precio al producto.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'stock.min' => 'El stock no puede ser negativo.',
            'imagen.required' => 'Es obligatorio subir una imagen.',
            'imagen.image' => 'El archivo subido debe ser una imagen válida.'
        ];
    }
}