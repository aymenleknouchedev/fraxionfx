<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogPosts = Blog::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.blog', ['blogPosts' => $blogPosts]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'featured_image' => 'nullable|url',
        ]);

        $validated['user_id'] = Auth::id();

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = \Str::slug($validated['title']);
        }

        Blog::create($validated);

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.blog-edit', ['blog' => $blog]);
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'featured_image' => 'nullable|url',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = \Str::slug($validated['title']);
        }

        $blog->update($validated);

        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully!');
    }
}
