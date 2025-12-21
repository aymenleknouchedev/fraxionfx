@extends('layouts.app')

@section('title', 'My Profile')

@section('meta_description', 'Manage your profile information')

@section('meta_keywords', 'profile, settings, account')

@section('body_class', 'layout-with-sidebar')

@section('useSidebar', '1')

@section('content')
    <!-- Include Success Modal Component -->
    @include('layouts.partials.success-modal')

    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        

        @if ($errors->any())
            <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 1rem; border-radius: 4px; margin-bottom: 2rem;">
                <strong>Please fix the following errors:</strong>
                <ul style="margin: 0.5rem 0 0 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px;">
            @csrf
            @method('PUT')

            <!-- Profile Photo -->
            <div style="margin-bottom: 2rem;">
                <label style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 1rem;">
                    <i class="fas fa-image"></i> Profile Photo
                </label>

                <div style="display: flex; gap: 2rem; align-items: flex-start;">
                    <!-- Current Photo -->
                    <div style="flex-shrink: 0;">
                        @if (Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                                alt="Profile Photo"
                                style="width: 120px; height: 120px; border-radius: 8px; object-fit: cover; border: 2px solid var(--blue);">
                        @else
                            <div style="width: 120px; height: 120px; border-radius: 8px; background: #e0e0e0; display: flex; align-items: center; justify-content: center; border: 2px solid #ccc;">
                                <i class="fas fa-user" style="font-size: 3rem; color: #999;"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Upload Section -->
                    <div style="flex: 1;">
                        <input type="file"
                            name="photo"
                            accept="image/*"
                            id="photo"
                            style="display: block; margin-bottom: 0.5rem; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; width: 100%; cursor: pointer;">
                        <small style="color: #666;">
                            <i class="fas fa-info-circle"></i> Accepted formats: JPG, PNG, GIF (Max 2MB)
                        </small>
                    </div>
                </div>
            </div>

            <!-- Full Name -->
            <div style="margin-bottom: 2rem;">
                <label for="name" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                    <i class="fas fa-user"></i> Full Name *
                </label>
                <input type="text"
                    name="name"
                    id="name"
                    value="{{ Auth::user()->name }}"
                    placeholder="Enter your full name"
                    required
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                @error('name')
                    <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Job Name -->
            <div style="margin-bottom: 2rem;">
                <label for="job_name" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                    <i class="fas fa-briefcase"></i> Job Title / Position
                </label>
                <input type="text"
                    name="job_name"
                    id="job_name"
                    value="{{ Auth::user()->job_name ?? '' }}"
                    placeholder="Enter your job title (e.g., Logo & Web Designer)"
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                @error('job_name')
                    <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
            </div>
            <div style="margin-bottom: 2rem;">
                <label for="summary" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                    <i class="fas fa-pen"></i> Summary / Bio
                </label>
                <textarea name="summary"
                    id="summary"
                    placeholder="Write a brief summary about yourself (max 500 characters)"
                    maxlength="500"
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 120px; font-family: inherit; box-sizing: border-box; resize: vertical;">{{ Auth::user()->summary }}</textarea>
                <small style="color: #666; display: block; margin-top: 0.25rem;">
                    <span id="char-count">{{ strlen(Auth::user()->summary ?? '') }}</span>/500 characters
                </small>
                @error('summary')
                    <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Submit Button -->
            <div style="display: flex; gap: 1rem;">
                <button type="submit"
                    style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; font-weight: bold; transition: opacity 0.3s;">
                    <i class="fas fa-save"></i> Save Profile
                </button>
                <a href="{{ route('dashboard') }}"
                    style="background: #ccc; color: #333; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; font-weight: bold; text-decoration: none; display: inline-block; transition: opacity 0.3s;">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    <script>
        // Character counter
        const summaryTextarea = document.getElementById('summary');
        const charCount = document.getElementById('char-count');

        if (summaryTextarea) {
            summaryTextarea.addEventListener('input', function() {
                charCount.textContent = this.value.length;
            });
        }

        // Image preview
        const photoInput = document.getElementById('photo');
        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    // You could show a preview here if desired
                    console.log('File selected:', file.name);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
