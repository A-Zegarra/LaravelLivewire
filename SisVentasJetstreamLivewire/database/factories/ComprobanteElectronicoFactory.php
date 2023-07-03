<?php

namespace Database\Factories;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComprobanteElectronico>
 */
class ComprobanteElectronicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serie' => $this->faker->randomNumber(4),
            'numero' => $this->faker->randomNumber(6),
            'fecha_emision' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['emitido', 'anulado']),
            'venta_id' => Venta::inRandomOrder()->first()->id
        ];
    }
}
