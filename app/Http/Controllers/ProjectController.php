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
            'summary' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5000',
            'video_url' => 'nullable|url|max:255',
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime,video/webm|max:200000', // ~200MB
            'project_date' => 'nullable|date',
            'project_duration' => 'nullable|string|max:100',
            'client_name' => 'nullable|string|max:150',
            'category' => 'nullable|string|max:100',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,gif,webp|max:100000', // ~100MB
            'status' => 'required|in:completed,in_progress,planned',
        ]);

        // Add user_id
        $validated['user_id'] = Auth::id();

        // Handle cover image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('projects/videos', 'public');
            $validated['video'] = $videoPath;
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

        // Store gallery images if provided
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $imageFile) {
                if (!$imageFile) {
                    continue;
                }

                $galleryPath = $imageFile->store('projects/gallery', 'public');

                $project->images()->create([
                    'image' => $galleryPath,
                    'sort_order' => $index,
                ]);
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
            'summary' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
            'video_url' => 'nullable|url|max:255',
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime,video/webm|max:51200',
            'project_date' => 'nullable|date',
            'project_duration' => 'nullable|string|max:100',
            'client_name' => 'nullable|string|max:150',
            'category' => 'nullable|string|max:100',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,gif,webp|max:4096',
            'status' => 'required|in:completed,in_progress,planned',
        ]);

        // Handle cover image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            if ($project->video) {
                Storage::disk('public')->delete($project->video);
            }

            $videoPath = $request->file('video')->store('projects/videos', 'public');
            $validated['video'] = $videoPath;
        }

        // Update project
        $project->update($validated);

        // Update skills if provided
        if ($request->has('skills')) {
            $skillIds = array_filter($request->input('skills', []));
            $project->skills()->sync($skillIds);
        }

        // Append new gallery images if provided (existing ones are kept)
        if ($request->hasFile('gallery_images')) {
            $existingCount = $project->images()->count();

            foreach ($request->file('gallery_images') as $index => $imageFile) {
                if (!$imageFile) {
                    continue;
                }

                $galleryPath = $imageFile->store('projects/gallery', 'public');

                $project->images()->create([
                    'image' => $galleryPath,
                    'sort_order' => $existingCount + $index,
                ]);
            }
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

        $project->delete();

        return redirect()->route('projects.index')
                       ->with('success', 'Project deleted successfully!');
    }

    /**
     * Show a public project details page.
     */
    public function show(Project $project)
    {
        $project->load(['skills', 'images', 'user']);

        return view('projects.show', compact('project'));
    }
}
