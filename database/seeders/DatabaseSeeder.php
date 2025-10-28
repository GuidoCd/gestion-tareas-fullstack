<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            PrioritySeeder::class,
            TagSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Usuario de Prueba',
            'email' => 'test@example.com',
            // La contraseña es "password"
        ]);

        User::factory(5)
        ->has(Task::factory()->count(10)) // ¡Esta es la magia!
        ->create();
    }
}
