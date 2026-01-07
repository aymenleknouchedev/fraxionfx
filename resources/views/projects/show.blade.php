<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Project Case Study</title>
        <meta name="description" content="{{ Str::limit($project->summary ?? $project->description ?? 'Project case study', 155) }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('template/css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('template/styles.css') }}">

        <!-- Google fonts (match landing page) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
          href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
</head>
<body>

    <nav id="header-nav" class="navbar navbar-expand-lg py-4" data-bs-theme="dark">
        <div class="container-fluid padding-side d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand fw-bold text-white d-flex align-items-center gap-2">
                <i class="fas fa-arrow-left"></i>
                <span>Back to home</span>
            </a>
        </div>
    </nav>

<section class="padding-medium">
    <div class="container text-white">
        <div class="row g-4 align-items-start">
            <div class="col-12 col-lg-7">
                <div class="mb-5">
                    <p class="text-uppercase text-primary mb-2" style="letter-spacing: .15em; font-size: .8rem;">
                        Case Study
                    </p>
                    <h1 class="display-4 fw-bold mb-3">{{ $project->title }}</h1>

                    @if ($project->status)
                        <span class="badge rounded-pill px-3 py-2 me-2 {{ $project->status === 'completed' ? 'bg-success' : ($project->status === 'in_progress' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                            @if ($project->status === 'completed')
                                <i class="fas fa-check-circle me-1"></i> Completed
                            @elseif ($project->status === 'in_progress')
                                <i class="fas fa-spinner me-1"></i> In Progress
                            @else
                                <i class="fas fa-calendar me-1"></i> Planned
                            @endif
                        </span>
                    @endif

                    @if ($project->project_date || $project->project_duration)
                        <span class="text-white-50 ms-1">
                            @if ($project->project_date)
                                {{ $project->project_date->format('F Y') }}
                            @endif
                            @if ($project->project_date && $project->project_duration)
                                &middot;
                            @endif
                            @if ($project->project_duration)
                                {{ $project->project_duration }}
                            @endif
                        </span>
                    @endif
                </div>

                <div class="mb-4 shadow-lg rounded-4 overflow-hidden" style="background: radial-gradient(circle at top, rgba(183,117,255,0.25), transparent 55%), radial-gradient(circle at bottom, rgba(59,130,246,0.2), transparent 55%);">
                    @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }} cover image"
                                class="img-fluid w-100" style="object-fit: cover; max-height: 480px; border-radius: 24px;">
                    @else
                            <div class="d-flex align-items-center justify-content-center text-center"
                                style="background: linear-gradient(135deg, #6c5ce7, #fd79a8); min-height: 260px; border-radius: 24px;">
                            <div>
                                <i class="fas fa-image fa-3x mb-3"></i>
                                <p class="mb-0 fw-semibold">No cover image provided</p>
                            </div>
                        </div>
                    @endif
                </div>

                @if ($project->summary)
                    <div class="mb-5">
                        <h2 class="h4 mb-3">Project Overview</h2>
                        <p class="text-white-50" style="line-height: 1.8;">{!! nl2br(e($project->summary)) !!}</p>
                    </div>
                @endif

                @if ($project->images->count() > 0)
                    <div class="mb-5">
                        <h2 class="h4 mb-3">Project Gallery</h2>
                        <div class="row g-3">
                            @foreach ($project->images as $image)
                                <div class="col-6 col-md-4">
                                    <div class="position-relative rounded-3 overflow-hidden" style="background: #111;">
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption ?: $project->title }} image"
                                             class="img-fluid w-100" style="object-fit: cover; height: 160px;">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-12 col-lg-5">
                <div class="mb-4 p-4 rounded-4" style="background: linear-gradient(135deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02)); border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 18px 60px rgba(15,23,42,0.7);">
                    <h2 class="h5 mb-3">Project Details</h2>
                    <dl class="row mb-0 small">
                        @if ($project->client_name)
                            <dt class="col-4 text-white-50">Client</dt>
                            <dd class="col-8">{{ $project->client_name }}</dd>
                        @endif

                        @if ($project->category)
                            <dt class="col-4 text-white-50">Category</dt>
                            <dd class="col-8">{{ $project->category }}</dd>
                        @endif

                        @if ($project->project_date)
                            <dt class="col-4 text-white-50">Date</dt>
                            <dd class="col-8">{{ $project->project_date->format('F j, Y') }}</dd>
                        @endif

                        @if ($project->project_duration)
                            <dt class="col-4 text-white-50">Duration</dt>
                            <dd class="col-8">{{ $project->project_duration }}</dd>
                        @endif

                        @if ($project->user)
                            <dt class="col-4 text-white-50">Owner</dt>
                            <dd class="col-8">{{ $project->user->name }}</dd>
                        @endif

                        @if ($project->skills->count() > 0)
                            <dt class="col-4 text-white-50">Technologies</dt>
                            <dd class="col-8">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($project->skills as $skill)
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle">{{ $skill->name }}</span>
                                    @endforeach
                                </div>
                            </dd>
                        @endif

                        @if ($project->model_file)
                            <dt class="col-4 text-white-50">3D File</dt>
                            <dd class="col-8">
                                <a href="{{ asset('storage/' . $project->model_file) }}" class="btn btn-sm btn-outline-light rounded-pill px-3" target="_blank" rel="noopener">
                                    <i class="fas fa-download me-1"></i> Download 3D Asset
                                </a>
                            </dd>
                        @endif
                    </dl>
                </div>

                @if ($project->video_url || $project->video)
                    @php
                        $rawUrl = $project->video_url;
                        $embedUrl = null;

                        if ($rawUrl) {
                            $parsed = parse_url($rawUrl);
                            $host = $parsed['host'] ?? '';

                            // YouTube long URL: https://www.youtube.com/watch?v=ID
                            if (str_contains($host, 'youtube.com') && isset($parsed['query'])) {
                                parse_str($parsed['query'], $queryParams);
                                if (!empty($queryParams['v'])) {
                                    $videoId = $queryParams['v'];
                                    $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                                }
                            }

                            // YouTube short URL: https://youtu.be/ID
                            if (!$embedUrl && str_contains($host, 'youtu.be') && !empty($parsed['path'])) {
                                $videoId = ltrim($parsed['path'], '/');
                                $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                            }

                            // Vimeo standard URL: https://vimeo.com/ID
                            if (!$embedUrl && str_contains($host, 'vimeo.com') && !empty($parsed['path'])) {
                                $segments = explode('/', trim($parsed['path'], '/'));
                                $videoId = end($segments);
                                if ($videoId) {
                                    $embedUrl = 'https://player.vimeo.com/video/' . $videoId;
                                }
                            }

                            // If already an embed/player URL or unknown provider, use as-is
                            if (!$embedUrl) {
                                $embedUrl = $rawUrl;
                            }
                        }
                    @endphp

                    <div class="mb-4 p-4 rounded-4" style="background: #05040a; border: 1px solid rgba(255,255,255,0.08); box-shadow: 0 18px 60px rgba(15,23,42,0.7);">
                        <h2 class="h5 mb-3">Project Video</h2>

                        @if ($project->video)
                            <video class="w-100 rounded-3 mb-3" controls preload="metadata">
                                <source src="{{ asset('storage/' . $project->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif

                        @if ($embedUrl)
                            <div class="ratio ratio-16x9 mb-3">
                                <iframe src="{{ $embedUrl }}" title="{{ $project->title }} video"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen loading="lazy"></iframe>
                            </div>
                        @endif

                        <p class="text-white-50 small mt-2 mb-0">This video highlights key interactions, flows, and outcomes from the project.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<footer class="padding-medium pt-0">
    <div class="container text-white-50 small text-center">
        <hr class="border-secondary mb-3">
        <p class="mb-1">&copy; {{ date('Y') }} {{ \App\Models\User::first()?->name ?? 'Portfolio' }}. All rights reserved.</p>
        <a href="{{ url('/') }}" class="text-decoration-none text-white-50">Back to home</a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>
