<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Comprobante;
use App\Models\Contenedor;
use App\Models\Detalle_Contenedor;
use App\Models\Detalle_Usuario;
use App\Models\Ingreso;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Rol;
use App\Models\Salida;
use App\Models\Tipo_Comprobante;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Categoria::factory(10)->create();
        Producto::factory(10)->create();
        Proveedor::factory(10)->create();
        Contenedor::factory(10)->create();
        Detalle_Contenedor::factory(10)->create();
        Ingreso::factory(10)->create();
        Salida::factory(10)->create();
        Cliente::factory(10)->create();
        Tipo_Comprobante::factory(10)->create();
        Rol::factory(10)->create();
        Detalle_Usuario::factory(10)->create();
        Comprobante::factory(10)->create();


    }
}
