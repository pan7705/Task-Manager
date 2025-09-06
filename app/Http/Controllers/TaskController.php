<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Ambik semua data dari table Task
        $task = Task::all();

        //Hantar data ke view
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        // validate data dulu sebelum simpan
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "due_date" => "nullable|date",
            "status" => "required|boolean",
        ]);

        // Simpan data ke database
        Task::create([
            "title" => $request->title,
            "description" => $request->description,
            "due_date" => $request->due_date,
            "status" => $request->status,
        ]);

        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task) // <- model binding (Task $task)
    {
        return view('task.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // validate data dulu sebelum simpan
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "due_date" => "nullable|date",
            "status" => "required|boolean",
        ]);

        // Update data ke database
        $task->update([
            "title" => $request->title,
            "description" => $request->description,
            "due_date" => $request->due_date,
            "status" => $request->status,
        ]);

        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }
}
