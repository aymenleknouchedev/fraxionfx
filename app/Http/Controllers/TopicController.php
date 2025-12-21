<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Show all topics for the user
     */
    public function index()
    {
        $topics = Auth::user()->topics()->orderBy('created_at', 'desc')->get();
        return view('dashboard.topics', compact('topics'));
    }

    /**
     * Store a new topic
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:50',
        ]);

        // Add user_id
        $validated['user_id'] = Auth::id();

        // Create topic
        Topic::create($validated);

        return redirect()->route('topics.index')
                       ->with('success', 'Topic created successfully!');
    }

    /**
     * Update a topic
     */
    public function update(Request $request, Topic $topic)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:50',
        ]);

        // Update topic
        $topic->update($validated);

        return redirect()->route('topics.index')
                       ->with('success', 'Topic updated successfully!');
    }

    /**
     * Delete a topic
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index')
                       ->with('success', 'Topic deleted successfully!');
    }
}
