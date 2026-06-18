<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\Consulta;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        // 1. Validamos los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'mensaje' => 'required|string'
        ]);

        // 2. Unimos Nombre y Apellido para guardarlo completo en la base de datos
        $nombreCompleto = $request->nombre . ' ' . $request->apellido;

        // 3. Le agregamos el teléfono al final del mensaje
        $mensajeConTelefono = $request->mensaje;
        if ($request->telefono) {
            $mensajeConTelefono .= "\n\n--- \nTeléfono de contacto: " . $request->telefono;
        }

        // 4. Guardamos todo en la base de datos
        Mensaje::create([
            'nombre' => trim($nombreCompleto),
            'email' => $request->email,
            'asunto' => 'Consulta desde la web',
            'mensaje' => $mensajeConTelefono,
            'leido' => false,
        ]);

        // 5. Agarramos solo el nombre de pila (para que el saludo sea "Hola Daniela" y no "Hola Daniela Ledesma")
        Consulta::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
            'leido' => false
        ]);

        $nombre = $request->nombre;

        // 6. Cargamos tu vista 'exito' y le pasamos la variable $nombre
        return view('exito', compact('nombre'));
    }
}