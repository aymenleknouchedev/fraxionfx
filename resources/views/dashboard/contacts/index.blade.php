@extends('layouts.app')

@section('title', 'Contact Messages')

@section('meta_description', 'Manage contact messages from your portfolio')

@section('meta_keywords', 'contacts, messages, inquiries, portfolio')

@section('body_class', 'layout-with-sidebar')

@section('useSidebar', '1')

@section('content')
    @include('layouts.partials.delete-modal')

    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="color: var(--blue); margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-envelope"></i> Contact Messages
        </h2>

        @if (session('success'))
            <div style="background: #e8f5e9; border: 1px solid #4caf50; color: #2e7d32; padding: 1rem; border-radius: 4px; margin-bottom: 1.5rem;">
                <strong>✓ Success!</strong> {{ session('success') }}
            </div>
        @endif

        <!-- Messages List -->
        <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3 style="color: var(--blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-list"></i> All Messages ({{ $contacts->total() }})
            </h3>

            @if ($contacts->count() > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                                <th style="padding: 1rem; text-align: left; color: var(--blue); font-weight: bold;">Name</th>
                                <th style="padding: 1rem; text-align: left; color: var(--blue); font-weight: bold;">Email</th>
                                <th style="padding: 1rem; text-align: left; color: var(--blue); font-weight: bold;">Phone</th>
                                <th style="padding: 1rem; text-align: left; color: var(--blue); font-weight: bold;">Subject</th>
                                <th style="padding: 1rem; text-align: left; color: var(--blue); font-weight: bold;">Date</th>
                                <th style="padding: 1rem; text-align: left; color: var(--blue); font-weight: bold;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr style="border-bottom: 1px solid #eee; transition: background 0.3s;" onmouseover="this.style.background='#fafafa'" onmouseout="this.style.background='white'">
                                    <td style="padding: 1rem;">
                                        <strong style="color: var(--blue);">{{ $contact->name }}</strong>
                                    </td>
                                    <td style="padding: 1rem;">
                                        <a href="mailto:{{ $contact->email }}" style="color: var(--orange); text-decoration: none;">{{ $contact->email }}</a>
                                    </td>
                                    <td style="padding: 1rem;">
                                        @if ($contact->phone)
                                            <a href="tel:{{ $contact->phone }}" style="color: var(--orange); text-decoration: none;">{{ $contact->phone }}</a>
                                        @else
                                            <span style="color: #999;">—</span>
                                        @endif
                                    </td>
                                    <td style="padding: 1rem; color: #666;">
                                        {{ $contact->subject ?? '—' }}
                                    </td>
                                    <td style="padding: 1rem; color: #999; font-size: 0.9rem;">
                                        {{ $contact->created_at->format('M d, Y H:i') }}
                                    </td>
                                    <td style="padding: 1rem;">
                                        <a href="{{ route('contacts.show', $contact) }}"
                                            style="display: inline-block; background: var(--blue); color: white; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; font-size: 0.9rem; margin-right: 0.5rem; transition: opacity 0.3s;">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form id="deleteForm_{{ $contact->id }}" action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" onclick="openDeleteModal(document.getElementById('deleteForm_{{ $contact->id }}'))"
                                            style="display: inline-block; background: #c33; color: white; padding: 0.5rem 1rem; border-radius: 4px; border: none; cursor: pointer; font-size: 0.9rem; transition: opacity 0.3s;">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($contacts->hasPages())
                    <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 0.5rem;">
                        {{ $contacts->links() }}
                    </div>
                @endif
            @else
                <div style="text-align: center; padding: 3rem 2rem; color: #999;">
                    <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                    <p style="font-size: 1.1rem;">No contact messages yet. Your portfolio visitors' messages will appear here.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
