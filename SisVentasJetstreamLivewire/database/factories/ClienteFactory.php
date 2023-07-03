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
            'nombre' => $this->faker->name,
            'razon_social' => $this->faker->company,
            'tipo_documento' => $this->faker->randomElement(['DNI', 'RUC']),
            'nro_documento' => $this->faker->unique()->randomNumber(8),
            'correo' => $this->faker->email,
            'telefono' => $this->faker->phoneNumber,
            'pais' => $this->faker->country,
            'ciudad' => $this->faker->city,
            'nacimiento' => $this->faker->date,
            'foto' => $this->faker->imageUrl(),
        ];
    }
}
