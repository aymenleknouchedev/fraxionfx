@extends('layouts.app')

@section('title', 'Topics')

@section('meta_description', 'Manage your topics and areas of expertise')

@section('meta_keywords', 'topics, skills, expertise, interests')

@section('body_class', 'layout-with-sidebar')

@section('useSidebar', '1')

@section('content')
    <!-- Include Success Modal Component -->
    @include('layouts.partials.success-modal')

    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="color: var(--blue); margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-tag"></i> Topics & Skills
        </h2>

        <!-- Add New Topic Form -->
        <div style="background: #f9f9f9; padding: 2rem; border-radius: 8px; border: 1px solid #eee; margin-bottom: 2rem;">
            <h3 style="color: var(--blue); margin-bottom: 1.5rem; font-size: 1.1rem;">
                <i class="fas fa-plus-circle"></i> Add New Topic
            </h3>

            @if ($errors->any())
                <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin: 0.5rem 0 0 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('topics.store') }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: 2fr 2fr 1fr auto; gap: 1rem; align-items: flex-end;">
                    <!-- Topic Name -->
                    <div>
                        <label for="name" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Topic Name *
                        </label>
                        <input type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            placeholder="e.g., Web Development"
                            required
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Description (Optional)
                        </label>
                        <input type="text"
                            name="description"
                            id="description"
                            value="{{ old('description') }}"
                            placeholder="Brief description"
                            maxlength="500"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Icon (Optional)
                        </label>
                        <input type="text"
                            name="icon"
                            id="icon"
                            value="{{ old('icon') }}"
                            placeholder="fa-code"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; transition: opacity 0.3s; white-space: nowrap;">
                        <i class="fas fa-plus"></i> Add Topic
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Topics Table -->
    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h3 style="color: var(--blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-list"></i> Your Topics ({{ $topics->count() }})
        </h3>

        @if ($topics->isEmpty())
            <div style="text-align: center; padding: 3rem 2rem; color: #999;">
                <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                <p style="font-size: 1.1rem;">No topics yet. Create your first topic above!</p>
            </div>
        @else
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--blue);">
                            <th style="padding: 1rem; text-align: left; color: var(--blue); font-weight: bold;">Topic</th>
                            <th style="padding: 1rem; text-align: left; color: var(--blue); font-weight: bold;">Description</th>
                            <th style="padding: 1rem; text-align: center; color: var(--blue); font-weight: bold;">Icon</th>
                            <th style="padding: 1rem; text-align: center; color: var(--blue); font-weight: bold;">Created</th>
                            <th style="padding: 1rem; text-align: center; color: var(--blue); font-weight: bold;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topics as $topic)
                            <tr style="border-bottom: 1px solid #eee; hover: { background-color: #f9f9f9; }">
                                <td style="padding: 1rem; color: #333;">
                                    <strong>{{ $topic->name }}</strong>
                                </td>
                                <td style="padding: 1rem; color: #666;">
                                    {{ $topic->description ? substr($topic->description, 0, 50) . (strlen($topic->description) > 50 ? '...' : '') : 'N/A' }}
                                </td>
                                <td style="padding: 1rem; text-align: center; color: #666;">
                                    @if ($topic->icon)
                                        <i class="fas fa-{{ str_replace('fa-', '', $topic->icon) }}" style="font-size: 1.2rem; color: var(--orange);"></i>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td style="padding: 1rem; text-align: center; color: #666; font-size: 0.9rem;">
                                    {{ $topic->created_at->format('M d, Y') }}
                                </td>
                                <td style="padding: 1rem; text-align: center;">
                                    <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                        <button onclick="editTopic({{ $topic->id }}, '{{ $topic->name }}', '{{ $topic->description }}', '{{ $topic->icon }}')"
                                            style="background: var(--blue); color: white; padding: 0.5rem 1rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem; text-decoration: none;">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="background: #c33; color: white; padding: 0.5rem 1rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem;">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Edit Modal -->
    <div id="editModal" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    ">
        <div style="
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 90%;
        ">
            <h2 style="color: var(--blue); margin-bottom: 1.5rem;">
                <i class="fas fa-edit"></i> Edit Topic
            </h2>

            <form id="editForm" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
                @csrf
                @method('PUT')

                <div>
                    <label for="editName" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Topic Name
                    </label>
                    <input type="text"
                        id="editName"
                        name="name"
                        required
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                </div>

                <div>
                    <label for="editDescription" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Description
                    </label>
                    <textarea
                        id="editDescription"
                        name="description"
                        maxlength="500"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 100px; font-family: inherit; box-sizing: border-box;"></textarea>
                </div>

                <div>
                    <label for="editIcon" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Icon
                    </label>
                    <input type="text"
                        id="editIcon"
                        name="icon"
                        placeholder="fa-code"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Font Awesome icon</small>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button type="button"
                        onclick="closeEditModal()"
                        style="background: #ccc; color: #333; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                        Cancel
                    </button>
                    <button type="submit"
                        style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editTopic(id, name, description, icon) {
            document.getElementById('editName').value = name;
            document.getElementById('editDescription').value = description;
            document.getElementById('editIcon').value = icon;
            document.getElementById('editForm').action = `/topics/${id}`;
            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Close modal when clicking outside
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>
@endsection
