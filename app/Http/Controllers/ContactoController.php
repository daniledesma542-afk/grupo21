<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'email' => 'required|email',
            'telefono' => 'required|max:30',
            'mensaje' => 'required|min:10|max:500'
        ]);

        Consulta::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
            'leido' => false
        ]);

        $nombre = $request->nombre;

        return view('exito', compact('nombre'));
    }
}