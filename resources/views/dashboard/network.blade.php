@extends('layouts.app')

@section('title', 'Network & Social Media')

@section('meta_description', 'Manage your social media links and online presence')

@section('meta_keywords', 'network, social media, links, profile')

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

        <form action="{{ route('network.update') }}" method="POST" style="max-width: 700px;">
            @csrf
            @method('PUT')

            <p style="color: #666; margin-bottom: 2rem;">
                <i class="fas fa-info-circle"></i> Add links to your social media profiles and online presence
            </p>

            <!-- Social Media Links -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <!-- GitHub -->
                <div>
                    <label for="github" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-github"></i> GitHub
                    </label>
                    <input type="url"
                        name="github"
                        id="github"
                        value="{{ Auth::user()->github }}"
                        placeholder="https://github.com/username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('github')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- LinkedIn -->
                <div>
                    <label for="linkedin" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-linkedin"></i> LinkedIn
                    </label>
                    <input type="url"
                        name="linkedin"
                        id="linkedin"
                        value="{{ Auth::user()->linkedin }}"
                        placeholder="https://linkedin.com/in/username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('linkedin')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Twitter -->
                <div>
                    <label for="twitter" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-twitter"></i> Twitter / X
                    </label>
                    <input type="url"
                        name="twitter"
                        id="twitter"
                        value="{{ Auth::user()->twitter }}"
                        placeholder="https://twitter.com/username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('twitter')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Instagram -->
                <div>
                    <label for="instagram" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-instagram"></i> Instagram
                    </label>
                    <input type="url"
                        name="instagram"
                        id="instagram"
                        value="{{ Auth::user()->instagram }}"
                        placeholder="https://instagram.com/username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('instagram')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Facebook -->
                <div>
                    <label for="facebook" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-facebook"></i> Facebook
                    </label>
                    <input type="url"
                        name="facebook"
                        id="facebook"
                        value="{{ Auth::user()->facebook }}"
                        placeholder="https://facebook.com/username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('facebook')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- YouTube -->
                <div>
                    <label for="youtube" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-youtube"></i> YouTube
                    </label>
                    <input type="url"
                        name="youtube"
                        id="youtube"
                        value="{{ Auth::user()->youtube }}"
                        placeholder="https://youtube.com/@username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('youtube')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Portfolio -->
                <div>
                    <label for="portfolio" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fas fa-globe"></i> Portfolio Website
                    </label>
                    <input type="url"
                        name="portfolio"
                        id="portfolio"
                        value="{{ Auth::user()->portfolio }}"
                        placeholder="https://yourportfolio.com"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('portfolio')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Behance -->
                <div>
                    <label for="behance" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-behance"></i> Behance
                    </label>
                    <input type="url"
                        name="behance"
                        id="behance"
                        value="{{ Auth::user()->behance }}"
                        placeholder="https://behance.net/username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('behance')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Dribbble -->
                <div>
                    <label for="dribbble" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-dribbble"></i> Dribbble
                    </label>
                    <input type="url"
                        name="dribbble"
                        id="dribbble"
                        value="{{ Auth::user()->dribbble }}"
                        placeholder="https://dribbble.com/username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('dribbble')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- CodePen -->
                <div>
                    <label for="codepen" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        <i class="fab fa-codepen"></i> CodePen
                    </label>
                    <input type="url"
                        name="codepen"
                        id="codepen"
                        value="{{ Auth::user()->codepen }}"
                        placeholder="https://codepen.io/username"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    @error('codepen')
                        <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <button type="submit"
                    style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; font-weight: bold; transition: opacity 0.3s;">
                    <i class="fas fa-save"></i> Save Links
                </button>
                <a href="{{ route('dashboard') }}"
                    style="background: #ccc; color: #333; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; font-weight: bold; text-decoration: none; display: inline-block; transition: opacity 0.3s;">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
