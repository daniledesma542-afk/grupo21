<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function panel() {
        return view('backend.usuarios.cliente');
    }
}
