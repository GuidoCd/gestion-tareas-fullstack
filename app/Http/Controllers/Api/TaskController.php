<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use AuthorizesRequests;
    
    public function index(Request $request)
    {
        $tasksQuery = Task::with(['priority', 'tags']);

        // Aplicamos el filtro de estado, solo si está presente en la URL
        $tasksQuery->when($request->estado, function ($query, $estado) {
            return $query->where('estado', $estado);
        });

        // Aplicamos el filtro de fecha, solo si está presente en la URL
        $tasksQuery->when($request->fecha_vencimiento, function ($query, $fecha) {
            return $query->whereDate('fecha_vencimiento', $fecha);
        });

        // Ejecutamos la consulta final, ordenada por la más reciente
        $tasks = $tasksQuery->latest()->paginate(10);
        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $task = Task::create($data);
        $task->tags()->attach($request->tags);

        return new TaskResource($task->load(['priority', 'tags']));
    }

    public function show(Task $task)
    {
        return new TaskResource($task->load(['priority', 'tags']));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        if ($request->has('tags')) {
            $task->tags()->sync($request->tags);
        }
        return new TaskResource($task->load(['priority', 'tags']));
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return response()->noContent();
    }
}
