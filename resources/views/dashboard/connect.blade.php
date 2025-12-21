@extends('layouts.app')

@section('title', 'Connect with Me')

@section('meta_description', 'Contact information and messaging platforms')

@section('meta_keywords', 'contact, email, phone, messaging, connect')

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

        <form action="{{ route('connect.update') }}" method="POST" style="max-width: 700px;">
            @csrf
            @method('PUT')

            <p style="color: #666; margin-bottom: 2rem;">
                <i class="fas fa-info-circle"></i> Add your contact information and messaging platforms
            </p>

            <!-- Email & Phone Section -->
            <div style="margin-bottom: 2rem;">
               

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <!-- Contact Email -->
                    <div>
                        <label for="contact_email" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email"
                            name="contact_email"
                            id="contact_email"
                            value="{{ Auth::user()->contact_email }}"
                            placeholder="contact@example.com"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        @error('contact_email')
                            <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Phone 1 -->
                    <div>
                        <label for="phone1" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            <i class="fas fa-phone"></i> Phone 1
                        </label>
                        <input type="tel"
                            name="phone1"
                            id="phone1"
                            value="{{ Auth::user()->phone1 }}"
                            placeholder="+1 (555) 000-0000"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        @error('phone1')
                            <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Phone 2 -->
                    <div>
                        <label for="phone2" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            <i class="fas fa-phone"></i> Phone 2 (Optional)
                        </label>
                        <input type="tel"
                            name="phone2"
                            id="phone2"
                            value="{{ Auth::user()->phone2 }}"
                            placeholder="+1 (555) 000-0000"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        @error('phone2')
                            <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Messaging Platforms Section -->
            <div style="margin-bottom: 2rem;">
                <h3 style="color: var(--blue); font-size: 1.1rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-comments"></i> Messaging Platforms
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <!-- WhatsApp -->
                    <div>
                        <label for="whatsapp" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </label>
                        <input type="tel"
                            name="whatsapp"
                            id="whatsapp"
                            value="{{ Auth::user()->whatsapp }}"
                            placeholder="+1 (555) 000-0000"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        @error('whatsapp')
                            <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Telegram -->
                    <div>
                        <label for="telegram" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            <i class="fab fa-telegram"></i> Telegram
                        </label>
                        <input type="text"
                            name="telegram"
                            id="telegram"
                            value="{{ Auth::user()->telegram }}"
                            placeholder="@username or t.me/username"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        @error('telegram')
                            <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Skype -->
                    <div>
                        <label for="skype" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            <i class="fab fa-skype"></i> Skype
                        </label>
                        <input type="text"
                            name="skype"
                            id="skype"
                            value="{{ Auth::user()->skype }}"
                            placeholder="skype:username"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        @error('skype')
                            <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Discord -->
                    <div>
                        <label for="discord" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            <i class="fab fa-discord"></i> Discord
                        </label>
                        <input type="text"
                            name="discord"
                            id="discord"
                            value="{{ Auth::user()->discord }}"
                            placeholder="username#0000"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        @error('discord')
                            <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Viber -->
                    <div>
                        <label for="viber" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            <i class="fas fa-phone"></i> Viber
                        </label>
                        <input type="tel"
                            name="viber"
                            id="viber"
                            value="{{ Auth::user()->viber }}"
                            placeholder="+1 (555) 000-0000"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        @error('viber')
                            <small style="color: #c33; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div style="display: flex; gap: 1rem;">
                <button type="submit"
                    style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; font-weight: bold; transition: opacity 0.3s;">
                    <i class="fas fa-save"></i> Save Contact Info
                </button>
                <a href="{{ route('dashboard') }}"
                    style="background: #ccc; color: #333; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; font-weight: bold; text-decoration: none; display: inline-block; transition: opacity 0.3s;">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
