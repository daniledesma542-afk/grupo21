<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'imagen', 'categoria_id'];

    // Esta función va ADENTRO de la clase Producto
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

} 