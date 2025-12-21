@extends('layouts.app')

@section('title', 'Dashboard')

@section('meta_description', 'View your portfolio dashboard with insights and statistics')

@section('meta_keywords', 'dashboard, insights, statistics, analytics, portfolio metrics')

@section('body_class', 'layout-with-sidebar')

@section('useSidebar', '1')


@section('content')
    <div style="padding: 2rem;">
        <!-- Page Header -->
        <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 2rem;">
            <h2 style="color: var(--blue); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-chart-line"></i> Dashboard
            </h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Overview of your portfolio performance and metrics</p>
            
            <!-- Quick Action Buttons -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <a href="{{ route('profile.show') }}"
                    style="background: var(--orange); color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; text-align: center; transition: transform 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-weight: bold;">
                    <i class="fas fa-user"></i> Edit Profile
                </a>
                <a href="{{ route('projects.index') }}"
                    style="background: var(--orange); color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; text-align: center; transition: transform 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-weight: bold;">
                    <i class="fas fa-plus"></i> New Project
                </a>
                <a href="{{ route('skills.index') }}"
                    style="background: var(--orange); color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; text-align: center; transition: transform 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-weight: bold;">
                    <i class="fas fa-star"></i> Add Skill
                </a>
                <a href="{{ route('reviews.index') }}"
                    style="background: var(--orange); color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; text-align: center; transition: transform 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-weight: bold;">
                    <i class="fas fa-comment"></i> Add Review
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <!-- Total Projects -->
            <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-left: 4px solid var(--blue);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="color: #666; font-size: 0.9rem; margin: 0;">Total Projects</p>
                        <h2 style="color: var(--blue); margin: 0.5rem 0 0 0; font-size: 2.5rem;">
                            {{ $totalProjects }}
                        </h2>
                    </div>
                    <i class="fas fa-folder-open" style="color: var(--blue); font-size: 2rem; opacity: 0.2;"></i>
                </div>
            </div>

            <!-- Completed Projects -->
            <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-left: 4px solid #4caf50;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="color: #666; font-size: 0.9rem; margin: 0;">Completed</p>
                        <h2 style="color: #4caf50; margin: 0.5rem 0 0 0; font-size: 2.5rem;">
                            {{ $completedProjects }}
                        </h2>
                        <p style="color: #999; font-size: 0.85rem; margin: 0.5rem 0 0 0;">
                            {{ $totalProjects > 0 ? round(($completedProjects / $totalProjects) * 100) : 0 }}% of total
                        </p>
                    </div>
                    <i class="fas fa-check-circle" style="color: #4caf50; font-size: 2rem; opacity: 0.2;"></i>
                </div>
            </div>

            <!-- In Progress Projects -->
            <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-left: 4px solid var(--orange);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="color: #666; font-size: 0.9rem; margin: 0;">In Progress</p>
                        <h2 style="color: var(--orange); margin: 0.5rem 0 0 0; font-size: 2.5rem;">
                            {{ $inProgressProjects }}
                        </h2>
                        <p style="color: #999; font-size: 0.85rem; margin: 0.5rem 0 0 0;">
                            {{ $totalProjects > 0 ? round(($inProgressProjects / $totalProjects) * 100) : 0 }}% of total
                        </p>
                    </div>
                    <i class="fas fa-spinner" style="color: var(--orange); font-size: 2rem; opacity: 0.2;"></i>
                </div>
            </div>

            <!-- Planned Projects -->
            <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-left: 4px solid #999;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="color: #666; font-size: 0.9rem; margin: 0;">Planned</p>
                        <h2 style="color: #999; margin: 0.5rem 0 0 0; font-size: 2.5rem;">
                            {{ $plannedProjects }}
                        </h2>
                        <p style="color: #999; font-size: 0.85rem; margin: 0.5rem 0 0 0;">
                            {{ $totalProjects > 0 ? round(($plannedProjects / $totalProjects) * 100) : 0 }}% of total
                        </p>
                    </div>
                    <i class="fas fa-calendar" style="color: #999; font-size: 2rem; opacity: 0.2;"></i>
                </div>
            </div>

            <!-- Total Skills -->
            <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-left: 4px solid #2196f3;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="color: #666; font-size: 0.9rem; margin: 0;">Total Skills</p>
                        <h2 style="color: #2196f3; margin: 0.5rem 0 0 0; font-size: 2.5rem;">
                            {{ $totalSkills }}
                        </h2>
                    </div>
                    <i class="fas fa-star" style="color: #2196f3; font-size: 2rem; opacity: 0.2;"></i>
                </div>
            </div>

            <!-- Reviews & Rating -->
            <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-left: 4px solid #ff9800;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="color: #666; font-size: 0.9rem; margin: 0;">Total Reviews</p>
                        <h2 style="color: #ff9800; margin: 0.5rem 0 0 0; font-size: 2.5rem;">
                            {{ $totalReviews }}
                        </h2>
                        @if ($totalReviews > 0)
                            <p style="color: #999; font-size: 0.85rem; margin: 0.5rem 0 0 0;">
                                <i class="fas fa-star" style="color: #ff9800;"></i>
                                {{ number_format($averageRating, 1) }} / 5.0 avg
                            </p>
                        @endif
                    </div>
                    <i class="fas fa-comment-dots" style="color: #ff9800; font-size: 2rem; opacity: 0.2;"></i>
                </div>
            </div>
        </div>

        <!-- Recent Projects -->
        <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 2rem;">
            <h3 style="color: var(--blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-clock"></i> Recent Projects
            </h3>

            @if ($recentProjects->isEmpty())
                <p style="color: #999; text-align: center; padding: 2rem;">No projects yet. <a href="{{ route('projects.index') }}" style="color: var(--blue); text-decoration: underline;">Create one now</a></p>
            @else
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid #eee;">
                                <th style="text-align: left; padding: 1rem; color: var(--blue); font-weight: bold;">Title</th>
                                <th style="text-align: left; padding: 1rem; color: var(--blue); font-weight: bold;">Status</th>
                                <th style="text-align: left; padding: 1rem; color: var(--blue); font-weight: bold;">Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentProjects as $project)
                                <tr style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 1rem; color: #333;">{{ $project->title }}</td>
                                    <td style="padding: 1rem;">
                                        @if ($project->status === 'completed')
                                            <span style="background: #4caf50; color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                                <i class="fas fa-check"></i> Completed
                                            </span>
                                        @elseif ($project->status === 'in_progress')
                                            <span style="background: var(--orange); color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                                <i class="fas fa-spinner"></i> In Progress
                                            </span>
                                        @else
                                            <span style="background: #999; color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                                <i class="fas fa-calendar"></i> Planned
                                            </span>
                                        @endif
                                    </td>
                                    <td style="padding: 1rem; color: #666; font-size: 0.9rem;">
                                        {{ $project->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Recent Reviews -->
        <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3 style="color: var(--blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-star"></i> Recent Reviews
            </h3>

            @if ($recentReviews->isEmpty())
                <p style="color: #999; text-align: center; padding: 2rem;">No reviews yet. <a href="{{ route('reviews.index') }}" style="color: var(--blue); text-decoration: underline;">Add your first review</a></p>
            @else
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                    @foreach ($recentReviews as $review)
                        <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 8px; border-left: 4px solid #ff9800;">
                            <!-- Rating -->
                            <div style="margin-bottom: 1rem;">
                                <span style="color: #ff9800;">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        ⭐
                                    @endfor
                                </span>
                            </div>

                            <!-- Message -->
                            <p style="color: #333; font-size: 0.95rem; line-height: 1.6; margin: 0 0 1rem 0;">
                                "{{ substr($review->message, 0, 100) }}{{ strlen($review->message) > 100 ? '...' : '' }}"
                            </p>

                            <!-- Client Info -->
                            <p style="color: #666; margin: 0; font-weight: bold;">
                                — {{ $review->client_name }}
                            </p>
                            @if ($review->client_title)
                                <p style="color: #999; margin: 0.25rem 0 0 0; font-size: 0.85rem;">
                                    {{ $review->client_title }}
                                    @if ($review->client_company)
                                        @ {{ $review->client_company }}
                                    @endif
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
