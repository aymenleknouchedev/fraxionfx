<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InsightsController extends Controller
{
    /**
     * Show insights and statistics
     */
    public function index()
    {
        $user = Auth::user();

        // Statistics
        $totalProjects = $user->projects()->count();
        $completedProjects = $user->projects()->where('status', 'completed')->count();
        $inProgressProjects = $user->projects()->where('status', 'in_progress')->count();
        $plannedProjects = $user->projects()->where('status', 'planned')->count();

        $totalSkills = $user->skills()->count();
        $totalReviews = $user->reviews()->count();
        $averageRating = $user->reviews()->avg('rating') ?? 0;

        // Recent projects
        $recentProjects = $user->projects()->orderBy('created_at', 'desc')->take(5)->get();

        // Recent reviews
        $recentReviews = $user->reviews()->orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard.insights', compact(
            'totalProjects',
            'completedProjects',
            'inProgressProjects',
            'plannedProjects',
            'totalSkills',
            'totalReviews',
            'averageRating',
            'recentProjects',
            'recentReviews'
        ));
    }
}
