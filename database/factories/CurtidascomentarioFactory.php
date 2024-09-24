<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Comentarios;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CurtidascomentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => User::pluck('id')->random(),
            'id_comentario' => Comentarios::pluck('id')->random(),
        ];
    }
}
