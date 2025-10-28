<?php

namespace Tests\Feature\Api;

use App\Models\Priority;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Prueba que el endpoint para listar tareas funciona correctamente.
     * @test
     */
    public function it_can_list_all_tasks(): void
    {
        Priority::factory()->create(['prioridad' => 'BAJA']);
        Priority::factory()->create(['prioridad' => 'MEDIA']);
        Priority::factory()->create(['prioridad' => 'ALTA']);
        
        Task::factory(3)->create();

        // ACT: Ejecutamos la acción que queremos probar.
        // Hacemos una petición GET a nuestro endpoint de API.
        $response = $this->getJson('/api/tasks');

        // ASSERT: Verificamos que el resultado sea el esperado.
        // 1. La respuesta debe tener un código de estado 200 (OK).
        $response->assertStatus(200);

        // 2. La respuesta JSON debe tener una clave "data" (gracias a nuestros API Resources).
        $response->assertJsonStructure(['data']);

        // 3. La clave "data" debe ser un array que contenga exactamente 3 elementos.
        $response->assertJsonCount(3, 'data');
    }
}
