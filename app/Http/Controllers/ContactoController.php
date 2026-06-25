<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'mensaje' => 'required|string|min:10|max:500'
        ]);

        $nombreCompleto = trim($request->nombre . ' ' . $request->apellido);

        $mensajeConTelefono = $request->mensaje;

        if ($request->telefono) {
            $mensajeConTelefono .= "\n\n---\nTeléfono de contacto: " . $request->telefono;
        }

        Mensaje::create([
            'nombre' => $nombreCompleto,
            'email' => $request->email,
            'asunto' => 'Consulta desde la web',
            'mensaje' => $mensajeConTelefono,
            'leido' => false,
        ]);

        $nombre = $request->nombre;

        return view('exito', compact('nombre'));
    }
}