<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = ['BAJA', 'MEDIA', 'ALTA'];

        foreach ($priorities as $p) {
            Priority::create(['prioridad' => $p]);
        }
    }
}
