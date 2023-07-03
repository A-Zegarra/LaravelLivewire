<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date(),
            'total_neto' => $this->faker->randomFloat(2, 10, 100),
            'total_impuestos' => $this->faker->randomFloat(2, 1, 10),
            'total_bruto' => $this->faker->randomFloat(2, 100, 1000),
            'cliente_id' => Cliente::inRandomOrder()->first()->id,
        ];
    }
}
