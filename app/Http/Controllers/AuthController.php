<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller{

    public function formularioRegistro(){
        return view('backend.usuarios.registro');
    }

    public function formularioLogin(){
        return view('backend.usuarios.login');
    }

    public function registrar(Request $request) {
        // Validamos los datos y definimos los mensajes en español
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ], [
            // Aquí personalizas cada mensaje de error:
            'name.required' => 'El campo nombre y apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Si pasa la validación, crea el usuario
        $usuario = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        \Illuminate\Support\Facades\Auth::login($usuario);

        return redirect('/cliente');
    }
    public function autenticar(Request $request) {
        // Validamos los campos del login con mensajes en español
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Intentamos iniciar sesión
        if (\Illuminate\Support\Facades\Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            
            // Redirección según el rol
            if (\Illuminate\Support\Facades\Auth::user()->rol === 'admin') {
                return redirect('/admin');
            }
            
            return redirect('/cliente');
        }

        // Si falla, vuelve atrás manteniendo el email
        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->withInput($request->only('email'));
    }
}
