<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Importamos tu modelo correcto

class AuthController extends Controller{

    public function formularioRegistro(){
        return view('backend.usuarios.registro');
    }

    public function formularioLogin(){
        return view('backend.usuarios.login');
    }

    public function registrar(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios', // Cambiamos users por usuarios
            'password' => 'required|min:6|confirmed'
        ], [
            'name.required' => 'El campo nombre y apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Acá usamos el modelo Usuario y el campo "nombre"
        $usuario = Usuario::create([
            'nombre' => $request->name, 
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'rol_id' => 2, // Le asignamos un rol_id por defecto (ej: 2 = cliente) para que no tire error
        ]);

        \Illuminate\Support\Facades\Auth::login($usuario);

        return redirect('/cliente');
    }

    public function autenticar(Request $request) {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        if (\Illuminate\Support\Facades\Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            
            if (\Illuminate\Support\Facades\Auth::user()->rol->nombre === 'admin') {
                return redirect('/admin');
            }
            
            return redirect('/cliente');
        }

        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}