<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Ambik semua data dari table Task (ni kalau system cuma ada 1 user je)
        // $tasks = Task::all();

        // ni kalau system ada multiple user
        $tasks = auth()->user()->tasks;

        $search = $request->search ?? null;
        $tasks = Task::search($search)->latest()->paginate(10);

        //Hantar data ke view
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        // $categories = Category::all();
        // $projects = Project::all();

        $categories = Category::where('user_id', auth()->id())->get();
        $projects = Project::where('user_id', auth()->id())->get();

        return view('task.create', compact('categories', 'projects'));
    }

    public function store(Request $request)
    {
        // validate data dulu sebelum simpan
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "due_date" => "nullable|date",
            "status" => "required|boolean",
            "category_id" => "nullable|exists:categories,id",
            "project_id" => "nullable|exists:projects,id",
        ]);

        // Simpan data ke database
        Task::create([
            // "user_id" => auth()->id(), (dah buat kat observer)
            "title" => $request->title,
            "description" => $request->description,
            "due_date" => $request->due_date,
            "status" => $request->status,
            "category_id" => $request->category_id,
            "project_id" => $request->project_id,
        ]);

        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task) // <- model binding (Task $task)
    {
        return view('task.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task); // Authorize using the policy

        $categories = Category::all();
        $projects = Project::all();
        return view('task.edit', compact('task', 'categories', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        // validate data dulu sebelum simpan
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "due_date" => "nullable|date",
            "status" => "required|boolean",
            "category_id" => "nullable|exists:categories,id",
            "project_id" => "nullable|exists:projects,id",
        ]);

        // Update data ke database
        $task->update([
            "title" => $request->title,
            "description" => $request->description,
            "due_date" => $request->due_date,
            "status" => $request->status,
            "category_id" => $request->category_id,
            "project_id" => $request->project_id,
        ]);

        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }
}
