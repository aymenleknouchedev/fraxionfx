<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Review;
use App\Models\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Get the first user profile data (main portfolio owner)
        $user = User::first();
        
        // Get projects grouped by status
        $projects = Project::where('user_id', $user->id ?? 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        // Get all skills
        $skills = Skill::where('user_id', $user->id ?? 1)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        
        // Get reviews/testimonials
        $reviews = Review::where('user_id', $user->id ?? 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        // Get articles
        $articles = Article::where('user_id', $user->id ?? 1)
            ->orderBy('publication_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        return view('welcome', [
            'user' => $user,
            'projects' => $projects,
            'skills' => $skills,
            'reviews' => $reviews,
            'articles' => $articles,
        ]);
    }
}
