<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'fecha' => $this->faker->date(),
            'tipoComprobante' => $this->faker->randomElement(['factura', 'recibo', 'nota']),
            'serie' => $this->faker->randomNumber(3),
            'numero' => $this->faker->randomNumber(6),
            'moneda' => $this->faker->randomElement(['USD', 'EUR', 'GBP']),
            'ruc' => $this->faker->numerify('###########'),
            'tipo_documento' => $this->faker->randomElement(['DNI', 'Carnet', 'Pasaporte']),
            'documento' => $this->faker->numerify('########'),
            'razonsocial' => $this->faker->company(),
            'direccion' => $this->faker->address(),
            'celular' => $this->faker->phoneNumber(),
            'descuento' => $this->faker->randomFloat(2, 0, 100),
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'tarjeta']),
            'observaciones' => $this->faker->text(),
            'total' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
