<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['DEV', 'QA', 'RRHH'];

        foreach ($tags as $t) {
            Tag::create(['etiqueta' => $t]);
        }
    }
}
