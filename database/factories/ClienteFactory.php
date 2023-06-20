<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'razonsocial'=> $this->faker->name(),
            'documento' => $this->faker->unique()->numberBetween(00000000, 99999999),
            'telefono' => $this->faker->unique()->numberBetween(900000000, 999999999),
            'correo' => $this->faker->unique()->safeEmail,
            'pais' => $this->faker->country(),
            'ciudad' => $this->faker->city(),
        ];
    }
}
