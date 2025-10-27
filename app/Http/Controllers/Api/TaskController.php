<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['priority', 'tags'])->latest()->get();
        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
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
        $task->delete();
        return response()->noContent();
    }
}
