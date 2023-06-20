<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ComprobanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_tipocomprobante' => $this->faker->numberBetween(1, 9),
            'id_cliente' => $this->faker->numberBetween(1, 9),
            'id_usuario' => $this->faker->numberBetween(1, 9),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'total' => $this->faker->randomFloat(2, 0, 100),

        ];
    }
}
