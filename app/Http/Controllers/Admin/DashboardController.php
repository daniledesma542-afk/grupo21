<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Usamos 'index' por convención para la vista principal
    public function index()
    {
        return view('backend.admin.dashboard');
    }
}