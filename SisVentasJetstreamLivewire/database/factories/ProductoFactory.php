<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
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
            'codigo' => $this->faker->unique()->randomNumber(6),
            'descripcion' => $this->faker->sentence,
            'cantidad_caja' => $this->faker->numberBetween(1, 10),
            'costo' => $this->faker->randomFloat(2, 1, 1000),
            'precio_menor' => $this->faker->randomFloat(2, 10, 100),
            'precio_mayor' => $this->faker->randomFloat(2, 100, 1000),
            'tipo_medida' => $this->faker->randomElement(['Kg', 'Unidad', 'Litro']),
            'foto' => $this->faker->imageUrl(),
            'categoria_id' => Categoria::inRandomOrder()->first()->id,
        ];
    }
}
