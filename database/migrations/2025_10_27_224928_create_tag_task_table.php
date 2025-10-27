<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tag_task', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');

            // Clave primaria compuesta para evitar duplicados
            $table->primary(['tag_id', 'task_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_task');
    }
};
