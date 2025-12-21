@extends('layouts.app')

@section('title', 'Message Details')

@section('meta_description', 'View contact message details')

@section('meta_keywords', 'contact, message, inquiry, portfolio')

@section('body_class', 'layout-with-sidebar')

@section('useSidebar', '1')

@section('content')
    @include('layouts.partials.delete-modal')

    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="color: var(--blue); margin: 0; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-envelope-open"></i> Message Details
            </h2>
            <a href="{{ route('contacts.index') }}"
                style="background: var(--blue); color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: bold; transition: opacity 0.3s;">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        <!-- Message Card -->
        <div style="background: #f9f9f9; border-radius: 8px; overflow: hidden; border: 1px solid #eee;">
            <!-- Header Section -->
            <div style="background: linear-gradient(135deg, var(--blue), var(--orange)); color: white; padding: 2rem;">
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
                    <!-- Sender Info -->
                    <div>
                        <h3 style="margin: 0 0 1rem 0; font-size: 1.8rem;">{{ $contact->name }}</h3>
                        <p style="margin: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:{{ $contact->email }}" style="color: white; text-decoration: none;">{{ $contact->email }}</a>
                        </p>
                        @if ($contact->phone)
                            <p style="margin: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-phone"></i>
                                <a href="tel:{{ $contact->phone }}" style="color: white; text-decoration: none;">{{ $contact->phone }}</a>
                            </p>
                        @endif
                    </div>

                    <!-- Date -->
                    <div style="text-align: right;">
                        <p style="margin: 0; font-size: 0.9rem; opacity: 0.9;">
                            <i class="fas fa-calendar"></i> Received
                        </p>
                        <p style="margin: 0.5rem 0 0 0; font-size: 1.3rem; font-weight: bold;">
                            {{ $contact->created_at->format('M d, Y') }}
                        </p>
                        <p style="margin: 0.25rem 0 0 0; font-size: 0.9rem; opacity: 0.9;">
                            {{ $contact->created_at->format('h:i A') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div style="padding: 2rem;">
                @if ($contact->subject)
                    <div style="margin-bottom: 2rem;">
                        <h4 style="color: var(--blue); margin: 0 0 0.75rem 0; font-size: 1.1rem;">
                            <i class="fas fa-heading"></i> Subject
                        </h4>
                        <p style="background: white; padding: 1rem; border-radius: 4px; border-left: 4px solid var(--orange); margin: 0; color: #333; font-size: 1.05rem;">
                            {{ $contact->subject }}
                        </p>
                    </div>
                @endif

                <div style="margin-bottom: 2rem;">
                    <h4 style="color: var(--blue); margin: 0 0 0.75rem 0; font-size: 1.1rem;">
                        <i class="fas fa-message"></i> Message
                    </h4>
                    <div style="background: white; padding: 1.5rem; border-radius: 4px; border-left: 4px solid var(--orange); color: #333; line-height: 1.8; white-space: pre-wrap; word-wrap: break-word;">
                        {{ $contact->message }}
                    </div>
                </div>
            </div>

            <!-- Action Section -->
            <div style="background: #f0f0f0; padding: 1.5rem; display: flex; gap: 1rem; border-top: 1px solid #ddd;">
                <a href="mailto:{{ $contact->email }}"
                    style="background: var(--blue); color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: bold; transition: opacity 0.3s; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-reply"></i> Reply via Email
                </a>
                <form id="deleteForm" action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" onclick="openDeleteModal(document.getElementById('deleteForm'))"
                    style="background: #c33; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; border: none; cursor: pointer; font-weight: bold; transition: opacity 0.3s; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-trash"></i> Delete Message
                </button>
            </div>
        </div>
    </div>
@endsection
