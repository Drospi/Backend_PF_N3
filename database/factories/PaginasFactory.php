<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paginas>
 */
class PaginasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fechacreacion' => $this->faker->date('Y-m-d'),
            'fechamodificacion' => $this->faker->date('Y-m-d'),
            'usuariocreacion' => $this->faker->userName(),
            'usuariomodificacion' => $this->faker->userName(),
            'url' => $this->faker->url(),
            'nombre' => $this->faker->sentence(2),
            'descripcion' => $this->faker->sentence(10),
            'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'tipo' => $this->faker->word(),
        ];
    }
}
