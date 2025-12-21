@extends('layouts.app')

@section('title', 'Reviews')

@section('meta_description', 'Manage your client reviews and testimonials')

@section('meta_keywords', 'reviews, testimonials, client feedback, ratings')

@section('body_class', 'layout-with-sidebar')

@section('useSidebar', '1')

@section('content')
    <!-- Include Success Modal Component -->
    @include('layouts.partials.success-modal')
    
    <!-- Include Delete Modal Component -->
    @include('layouts.partials.delete-modal')

    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="color: var(--blue); margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-star"></i> Reviews & Testimonials
        </h2>

        <!-- Add New Review Form -->
        <div style="background: #f9f9f9; padding: 2rem; border-radius: 8px; border: 1px solid #eee; margin-bottom: 2rem;">
            <h3 style="color: var(--blue); margin-bottom: 1.5rem; font-size: 1.1rem;">
                <i class="fas fa-plus-circle"></i> Add New Review
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

            <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <!-- Client Name -->
                    <div>
                        <label for="client_name" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Client Name *
                        </label>
                        <input type="text"
                            name="client_name"
                            id="client_name"
                            value="{{ old('client_name') }}"
                            placeholder="John Doe"
                            required
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Client Title -->
                    <div>
                        <label for="client_title" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Client Title (Optional)
                        </label>
                        <input type="text"
                            name="client_title"
                            id="client_title"
                            value="{{ old('client_title') }}"
                            placeholder="e.g., CEO, Manager"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Client Company -->
                    <div>
                        <label for="client_company" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Client Company (Optional)
                        </label>
                        <input type="text"
                            name="client_company"
                            id="client_company"
                            value="{{ old('client_company') }}"
                            placeholder="Company Name"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Rating -->
                    <div>
                        <label for="rating" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Rating *
                        </label>
                        <select name="rating" id="rating" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                            <option value="">Select Rating</option>
                            <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ 5 Stars</option>
                            <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ 4 Stars</option>
                            <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ 3 Stars</option>
                            <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>⭐⭐ 2 Stars</option>
                            <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>⭐ 1 Star</option>
                        </select>
                    </div>

                    <!-- Client Image -->
                    <div>
                        <label for="client_image" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Client Photo (Optional)
                        </label>
                        <input type="file"
                            name="client_image"
                            id="client_image"
                            accept="image/*"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        <small style="color: #666; display: block; margin-top: 0.25rem;">Max 2MB</small>
                    </div>
                </div>

                <!-- Review Message -->
                <div style="margin-bottom: 2rem;">
                    <label for="message" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Review Message *
                    </label>
                    <textarea
                        name="message"
                        id="message"
                        placeholder="Write the review message..."
                        maxlength="1000"
                        required
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 120px; font-family: inherit; box-sizing: border-box; resize: vertical;">{{ old('message') }}</textarea>
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Max 1000 characters</small>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; transition: opacity 0.3s;">
                    <i class="fas fa-plus"></i> Add Review
                </button>
            </form>
        </div>

        <!-- Reviews List -->
        <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3 style="color: var(--blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-list"></i> Your Reviews ({{ $reviews->count() }})
            </h3>

            @if ($reviews->isEmpty())
                <div style="text-align: center; padding: 3rem 2rem; color: #999;">
                    <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                    <p style="font-size: 1.1rem;">No reviews yet. Add your first review above!</p>
                </div>
            @else
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem;">
                    @foreach ($reviews as $review)
                        <div style="background: #f9f9f9; border-radius: 8px; overflow: hidden; border: 1px solid #eee; padding: 1.5rem;">
                            <!-- Client Header -->
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                @if ($review->client_image)
                                    <img src="{{ asset('storage/' . $review->client_image) }}"
                                        alt="{{ $review->client_name }}"
                                        style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                @else
                                    <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, var(--blue), var(--orange)); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1.5rem;">
                                        {{ substr($review->client_name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <h4 style="color: var(--blue); margin: 0; font-size: 1rem;">
                                        {{ $review->client_name }}
                                    </h4>
                                    @if ($review->client_title)
                                        <p style="color: #666; margin: 0.25rem 0 0 0; font-size: 0.85rem;">
                                            {{ $review->client_title }}
                                        </p>
                                    @endif
                                    @if ($review->client_company)
                                        <p style="color: #999; margin: 0; font-size: 0.8rem;">
                                            {{ $review->client_company }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Rating -->
                            <div style="margin-bottom: 1rem;">
                                <span style="color: #ff9800;">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        ⭐
                                    @endfor
                                </span>
                                <span style="color: #ddd; font-size: 0.9rem;">
                                    @for ($i = $review->rating; $i < 5; $i++)
                                        ⭐
                                    @endfor
                                </span>
                            </div>

                            <!-- Message -->
                            <p style="color: #333; font-size: 0.95rem; line-height: 1.6; margin: 1rem 0;">
                                "{{ $review->message }}"
                            </p>

                            <!-- Date -->
                            <p style="color: #999; font-size: 0.85rem; margin: 1rem 0 0 0;">
                                <i class="fas fa-calendar"></i> {{ $review->created_at->format('M d, Y') }}
                            </p>

                            <!-- Actions -->
                            <div style="display: flex; gap: 0.5rem; margin-top: 1rem;">
                                <button onclick="editReview({{ $review->id }}, '{{ $review->client_name }}', '{{ $review->client_title }}', '{{ $review->client_company }}', '{{ $review->message }}', '{{ $review->rating }}')"
                                    style="flex: 1; background: var(--blue); color: white; padding: 0.5rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem; text-decoration: none;">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form id="deleteForm_{{ $review->id }}" action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" onclick="openDeleteModal(document.getElementById('deleteForm_{{ $review->id }}'))"
                                    style="flex: 1; background: #c33; color: white; padding: 0.5rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem;">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
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
        overflow-y: auto;
    ">
        <div style="
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 90%;
            margin: 2rem auto;
            max-height: 90vh;
            overflow-y: auto;
        ">
            <h2 style="color: var(--blue); margin-bottom: 1.5rem;">
                <i class="fas fa-edit"></i> Edit Review
            </h2>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <label for="editClientName" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Client Name
                    </label>
                    <input type="text"
                        id="editClientName"
                        name="client_name"
                        required
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box; margin-bottom: 1.5rem;">
                </div>

                <div>
                    <label for="editClientTitle" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Client Title
                    </label>
                    <input type="text"
                        id="editClientTitle"
                        name="client_title"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box; margin-bottom: 1.5rem;">
                </div>

                <div>
                    <label for="editClientCompany" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Client Company
                    </label>
                    <input type="text"
                        id="editClientCompany"
                        name="client_company"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box; margin-bottom: 1.5rem;">
                </div>

                <div>
                    <label for="editRating" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Rating
                    </label>
                    <select id="editRating" name="rating" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box; margin-bottom: 1.5rem;">
                        <option value="5">⭐⭐⭐⭐⭐ 5 Stars</option>
                        <option value="4">⭐⭐⭐⭐ 4 Stars</option>
                        <option value="3">⭐⭐⭐ 3 Stars</option>
                        <option value="2">⭐⭐ 2 Stars</option>
                        <option value="1">⭐ 1 Star</option>
                    </select>
                </div>

                <div>
                    <label for="editMessage" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Review Message
                    </label>
                    <textarea
                        id="editMessage"
                        name="message"
                        maxlength="1000"
                        required
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 100px; font-family: inherit; box-sizing: border-box; margin-bottom: 1.5rem;"></textarea>
                </div>

                <div>
                    <label for="editClientImage" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Client Photo
                    </label>
                    <input type="file"
                        id="editClientImage"
                        name="client_image"
                        accept="image/*"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box; margin-bottom: 1.5rem;">
                    <small style="color: #666; display: block; margin-bottom: 1.5rem;">Max 2MB (leave empty to keep current)</small>
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

    @include('layouts.partials.delete-modal')

    <script>
        function editReview(id, clientName, clientTitle, clientCompany, message, rating) {
            document.getElementById('editClientName').value = clientName;
            document.getElementById('editClientTitle').value = clientTitle;
            document.getElementById('editClientCompany').value = clientCompany;
            document.getElementById('editMessage').value = message;
            document.getElementById('editRating').value = rating;
            document.getElementById('editForm').action = `/reviews/${id}`;
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
