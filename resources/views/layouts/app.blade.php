<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Basic Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Page Title -->
    <title>@hasSection('title')@yield('title')@else Dashboard @endif</title>
    
    <!-- Meta Description -->
    <meta name="description" content="@yield('meta_description', 'Welcome to ' . config('app.name', 'Laravel'))">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="@yield('meta_keywords', 'laravel, dashboard, application')">
    
    <!-- Open Graph Meta Tags (for social media) -->
    <meta property="og:title" content="@hasSection('title'){{ config('app.name', 'Laravel') }} - @yield('title')@else{{ config('app.name', 'Laravel') }}@endif">
    <meta property="og:description" content="@yield('meta_description', 'Welcome to ' . config('app.name', 'Laravel'))">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:image" content="@yield('meta_image', asset('images/og-image.png'))">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@hasSection('title'){{ config('app.name', 'Laravel') }} - @yield('title')@else{{ config('app.name', 'Laravel') }}@endif">
    <meta name="twitter:description" content="@yield('meta_description', 'Welcome to ' . config('app.name', 'Laravel'))">
    <meta name="twitter:image" content="@yield('meta_image', asset('images/og-image.png'))">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#1e3a8a">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    
    <!-- Favicon and Icons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('styles')
</head>
<body class="@yield('body_class')">
    @hasSection('useSidebar')
        @include('layouts.partials.sidebar')
        <div class="main-content">
            @include('layouts.partials.navbar')
            <div class="navbar-content">
                @yield('content')
            </div>
        </div>
    @else
        @yield('content')
    @endif
    @stack('scripts')
    <script src="{{ asset('dashboard.js') }}"></script>
</body>
</html>