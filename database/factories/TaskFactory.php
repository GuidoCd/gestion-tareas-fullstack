<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Priority;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'estado' => $this->faker->randomElement(['pendiente', 'en_progreso', 'completada']),
            'fecha_vencimiento' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
            'priority_id' => Priority::inRandomOrder()->first()->id,
        ];
    }
}
