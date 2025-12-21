<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Show all projects for the user
     */
    public function index()
    {
        $projects = Auth::user()->projects()->with('skills')->orderBy('created_at', 'desc')->get();
        $skills = Auth::user()->skills()->orderBy('created_at', 'desc')->get();
        return view('dashboard.portfolio', compact('projects', 'skills'));
    }

    /**
     * Store a new project
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'status' => 'required|in:completed,in_progress,planned',
        ]);

        // Add user_id
        $validated['user_id'] = Auth::id();

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('projects/pdfs', 'public');
            $validated['pdf'] = $path;
        }

        // Create project
        $project = Project::create($validated);

        // Attach skills if provided
        if ($request->has('skills')) {
            $skillIds = array_filter($request->input('skills', []));
            if (!empty($skillIds)) {
                $project->skills()->sync($skillIds);
            }
        }

        return redirect()->route('projects.index')
                       ->with('success', 'Project created successfully!');
    }

    /**
     * Update a project
     */
    public function update(Request $request, Project $project)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'status' => 'required|in:completed,in_progress,planned',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            // Delete old PDF if exists
            if ($project->pdf) {
                Storage::disk('public')->delete($project->pdf);
            }
            $path = $request->file('pdf')->store('projects/pdfs', 'public');
            $validated['pdf'] = $path;
        }

        // Update project
        $project->update($validated);

        // Update skills if provided
        if ($request->has('skills')) {
            $skillIds = array_filter($request->input('skills', []));
            $project->skills()->sync($skillIds);
        }

        return redirect()->route('projects.index')
                       ->with('success', 'Project updated successfully!');
    }

    /**
     * Delete a project
     */
    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        // Delete PDF if exists
        if ($project->pdf) {
            Storage::disk('public')->delete($project->pdf);
        }

        $project->delete();

        return redirect()->route('projects.index')
                       ->with('success', 'Project deleted successfully!');
    }
}
