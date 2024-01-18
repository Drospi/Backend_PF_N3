<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enlaces>
 */
class EnlacesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idpagina' => $this->faker->numberBetween(1, 10),
            'descripcion' => $this->faker->sentence(),
            'fechacreacion' => $this->faker->date(),
            'fechamodificacion' => $this->faker->date(),
            'usuariocreacion' => $this->faker->userName(),
            'usuariomodificacion' => $this->faker->userName(),
        ];
    }
}
