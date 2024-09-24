<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'topico' => $this->faker->unique()->word,
            'titulo' => $this->faker->unique()->word,
            'descricao' => $this->faker->text,
            'imagem' => $this->faker->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(),
        ];
    }
}
