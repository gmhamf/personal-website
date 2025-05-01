<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('order')->latest()->get();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today',
            'progress' => 'sometimes|numeric|min:0|max:100' // تغيير required إلى sometimes
        ]);

        $task = Task::create(array_merge($validated, ['progress' => $validated['progress'] ?? 0]));

        return response()->json([
            'status' => 'success',
            'task' => $task
        ]);
    }

    public function toggle(Task $task)
    {
        $task->update(['completed' => !$task->completed]);
        return response()->json([
            'status' => 'success',
            'task' => $task->fresh()
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today',
            'progress' => 'required|numeric|min:0|max:100'
        ]);

        $task->update($validated);
        return response()->json([
            'status' => 'success',
            'task' => $task->fresh()
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['status' => 'success']);
    }
}
