<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    // Esto le permite a Laravel guardar datos en estos campos de forma masiva
    protected $fillable = ['nombre', 'email', 'asunto', 'mensaje', 'leido', 'respuesta'];
}