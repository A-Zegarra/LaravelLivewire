<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detalle_Contenedor>
 */
class Detalle_ContenedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_producto' => $this->faker->numberBetween(1, 9),
            'id_contenedor' => $this->faker->numberBetween(1, 9),
        ];
    }
}
