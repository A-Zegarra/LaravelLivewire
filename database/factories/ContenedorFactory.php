<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contenedor>
 */
class ContenedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(),
            'fecha' => $this->faker->date(),
            'yuan' => $this->faker->randomFloat(2, 0, 100),
            'dolar' => $this->faker->randomFloat(2, 0, 100),
            'gasto1' => $this->faker->randomFloat(2, 0, 100),
            'gasto2' => $this->faker->randomFloat(2, 0, 100),
            'gasto3' => $this->faker->randomFloat(2, 0, 100),
            'gasto4' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
