<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Reemplaza a tu función usuarios()
    public function index()
    {
        $usuarios = Usuario::with('rol')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.admin.usuarios', compact('usuarios'));
    }

    // Reemplaza a tu función eliminarUsuario()
    public function destroy($id)
    {
        if ((int) $id === auth()->id()) {
            return back()->with('error', 'No podés eliminar tu propia cuenta de administrador.');
        }

        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}