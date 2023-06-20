<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->sentence(),
            'codigo' => $this->faker->sentence(),
            'caja' => $this->faker->numberBetween(1000, 9000),
            'costo' => $this->faker->randomFloat(2, 0, 100),
            'precioMenor' => $this->faker->randomFloat(2, 0, 100),
            'precioMayor' => $this->faker->randomFloat(2, 0, 100),
            'origen' => $this->faker->sentence(),
            'imagen' => $this->faker->imageUrl(50,50,null,true),
            'id_categoria' => $this->faker->numberBetween(1, 2),
        ];
    }
}
