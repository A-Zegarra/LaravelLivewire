<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimiento>
 */
class MovimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_movimiento' => $this->faker->randomElement(['Entrada', 'Salida']),
            'cantidad' => $this->faker->randomNumber(4),
            'fecha_movimiento' => $this->faker->date(),
            'producto_id' => Producto::inRandomOrder()->first()->id
        ];
    }
}
