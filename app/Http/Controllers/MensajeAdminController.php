<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeAdminController extends Controller
{
    public function index()
    {
        $mensajes = Mensaje::orderBy('created_at', 'desc')->get();

        return view('backend.admin.mensajes', compact('mensajes'));
    }

    public function show($id)
    {
        $mensaje = Mensaje::findOrFail($id);

        return view('backend.admin.detalle-mensaje', compact('mensaje'));
    }

    public function marcarLeido($id)
    {
        $mensaje = Mensaje::findOrFail($id);

        $mensaje->update([
            'leido' => true
        ]);

        return redirect()
            ->route('admin.mensaje.show', $mensaje->id)
            ->with('success', 'Mensaje marcado como leído');
    }

    public function responder(Request $request, $id)
    {
        $request->validate([
            'respuesta' => 'required|string|max:1000'
        ]);

        $mensaje = Mensaje::findOrFail($id);

        $mensaje->update([
            'respuesta' => $request->respuesta,
            'leido' => true
        ]);

        return redirect()
            ->route('admin.mensaje.show', $mensaje->id)
            ->with('success', 'Respuesta guardada correctamente');
    }
}