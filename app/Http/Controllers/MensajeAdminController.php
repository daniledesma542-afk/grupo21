<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeAdminController extends Controller
{
    // Listar todos los mensajes
    public function index()
    {
        $mensajes = Mensaje::orderBy('created_at', 'desc')->get();
        return view('backend.admin.mensajes', compact('mensajes'));
    }

    // Marcar como leído
    public function marcarLeido($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update(['leido' => true]);
        
        return back()->with('success', 'Mensaje marcado como leído');
    }

    // Responder (guardar la respuesta)
    public function responder(Request $request, $id)
    {
        $request->validate(['respuesta' => 'required|string']);
        
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update([
            'respuesta' => $request->respuesta,
            'leido' => true // Al responder, lo marcamos como leído automáticamente
        ]);

        return back()->with('success', 'Respuesta guardada');
    }
}
