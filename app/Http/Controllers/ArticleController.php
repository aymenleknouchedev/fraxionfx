<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('user_id', Auth::id())
            ->orderBy('publication_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.articles', ['articles' => $articles]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:200',
            'content' => 'required|string',
            'source' => 'nullable|string|max:100',
            'publication_date' => 'nullable|date',
            'external_link' => 'nullable|url',
            'featured_image' => 'nullable|url',
            'tags' => 'nullable|string|max:500',
        ]);

        $validated['user_id'] = Auth::id();

        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article published successfully!');
    }

    public function edit(Article $article)
    {
        return view('dashboard.articles-edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:200',
            'content' => 'required|string',
            'source' => 'nullable|string|max:100',
            'publication_date' => 'nullable|date',
            'external_link' => 'nullable|url',
            'featured_image' => 'nullable|url',
            'tags' => 'nullable|string|max:500',
        ]);

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}
