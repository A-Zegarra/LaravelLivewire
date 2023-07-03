<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Importacion>
 */
class ImportacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_importacion' => $this->faker->date(),
            'total_gasto' => $this->faker->randomFloat(2, 10, 100),
            'proveedor_id' => Proveedor::inRandomOrder()->first()->id
        ];
    }
}
