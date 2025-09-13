<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::where('user_id', auth()->id())->get();
        return view('project.index', compact('projects'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        // validate data dulu sebelum simpan
        $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
        ]);

        // Simpan data ke database
        Project::create([
            // "user_id" => auth()->id(), (dah buat kat observer)
            "name" => $request->name,
            "description" => $request->description,
        ]);

        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project) // <- model binding (Project $project)
    {
        return view('project.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        // validate data dulu sebelum simpan
        $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
        ]);

        // Simpan data ke database
        $project->update([
            "name" => $request->name,
            "description" => $request->description,
        ]);

        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
