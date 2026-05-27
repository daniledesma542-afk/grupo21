<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol; // Importamos el modelo Rol

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Definimos los roles iniciales para Ondas de Sanación
        $roles = [
            ['nombre' => 'admin', 'descripcion' => 'Administrador del sistema'],
            ['nombre' => 'cliente', 'descripcion' => 'Cliente del ecommerce'],
        ];

        // Los guardamos en la base de datos sin duplicarlos
        foreach ($roles as $rol) {
            Rol::firstOrCreate(['nombre' => $rol['nombre']], $rol);
        }
    }
}
