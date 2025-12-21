<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard with insights
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

        return view('dashboard.index', compact(
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
