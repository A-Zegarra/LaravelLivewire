<?php

namespace Database\Factories;

use App\Models\Importacion;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleImportacion>
 */
class DetalleImportacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad' => $this->faker->randomNumber(3),
            'costo_unitario' => $this->faker->randomFloat(2, 10, 100),
            'importacion_id' => Importacion::inRandomOrder()->first()->id,
            'producto_id' => Producto::inRandomOrder()->first()->id
        ];
    }
}
