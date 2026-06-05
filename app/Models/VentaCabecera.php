<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaCabecera extends Model
{
    // 1. Le decimos a qué tabla de la base de datos pertenece
    protected $table = 'ventas_cabecera';

    // 2. Le decimos qué campos se pueden llenar desde un formulario o controlador
    protected $fillable = [
        'user_id', 'estado', 'total', 'fecha_venta',
    ];

    // 3. Convertimos la fecha para poder usarla más fácil después
    protected $casts = [
        'fecha_venta' => 'datetime',
    ];

    // 4. Relación: Esta venta pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    // 5. Relación: Esta venta tiene muchos productos adentro (detalles)
    public function detalles()
    {
        return $this->hasMany(VentaDetalle::class, 'venta_id');
    }
}