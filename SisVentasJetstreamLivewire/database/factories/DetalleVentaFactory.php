<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleVenta>
 */
class DetalleVentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad' => $this->faker->randomNumber(3),
            'precio_unitario' => $this->faker->randomFloat(2, 10, 10),
            'subtotal' => $this->faker->randomFloat(2, 10, 10),
            'impuestos' => $this->faker->randomFloat(2, 10, 10),
            'venta_id' => Venta::inRandomOrder()->first()->id,
            'producto_id' => Producto::inRandomOrder()->first()->id,
        ];
    }
}
