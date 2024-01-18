<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personas>
 */
class PersonasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->email(),
            'primernombre' => $this->faker->firstName(),
            'segundonombre' => $this->faker->firstName(),
            'primerapellido' => $this->faker->lastName(),
            'segundoapellido' => $this->faker->lastName(),
            'usuariocreacion' => $this->faker->userName(),
            'fechacreacion' => $this->faker->date(),
            'fechamodificacion' => $this->faker->date(),
            'usuariomodificacion' => $this->faker->userName(),
        ];
    }
}
