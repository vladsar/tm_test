<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Task\TaskCreateRequest;
use App\Http\Requests\Api\Task\TaskUpdateRequest;
use App\Models\Task;
use App\Http\Resources\Api\Task as TaskResource;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return TaskResource::collection($tasks);
    }

    public function store(TaskCreateRequest $request)
    {
        return Task::create($request->only([
            'title',
            'description',
        ]));
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->only([
            'title',
            'description',
            'is_completed',
        ]));

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

    }
}


