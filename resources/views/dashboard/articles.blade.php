@extends('layouts.app')

@section('useSidebar', true)

@section('title', 'Articles')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="color: var(--blue); margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-newspaper"></i> Articles
        </h2>

        <!-- Add New Article Form -->
        <div style="background: #f9f9f9; padding: 2rem; border-radius: 8px; border: 1px solid #eee; margin-bottom: 2rem;">
            <h3 style="color: var(--blue); margin-bottom: 1.5rem; font-size: 1.1rem;">
                <i class="fas fa-plus-circle"></i> Publish New Article
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

            <form action="{{ route('articles.store') }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr; gap: 1rem;">
                    <!-- Title -->
                    <div>
                        <label for="title" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Article Title *
                        </label>
                        <input type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            placeholder="e.g., The Future of AI in Business"
                            required
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Subtitle -->
                    <div>
                        <label for="subtitle" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Subtitle (Optional)
                        </label>
                        <input type="text"
                            name="subtitle"
                            id="subtitle"
                            value="{{ old('subtitle') }}"
                            placeholder="Brief subtitle or description"
                            maxlength="200"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Content -->
                    <div>
                        <label style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Article Content *
                        </label>
                        <div id="articleEditor" style="height: 400px; border: 1px solid #ddd; border-radius: 4px; background: white;"></div>
                        <input type="hidden" name="content" id="content">
                    </div>

                    <!-- Source/Publication -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="source" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                                Publication/Source (Optional)
                            </label>
                            <input type="text"
                                name="source"
                                id="source"
                                value="{{ old('source') }}"
                                placeholder="e.g., Medium, LinkedIn"
                                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        </div>

                        <div>
                            <label for="publication_date" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                                Publication Date (Optional)
                            </label>
                            <input type="date"
                                name="publication_date"
                                id="publication_date"
                                value="{{ old('publication_date') }}"
                                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        </div>
                    </div>

                    <!-- External Link -->
                    <div>
                        <label for="external_link" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            External Link (Optional)
                        </label>
                        <input type="url"
                            name="external_link"
                            id="external_link"
                            value="{{ old('external_link') }}"
                            placeholder="https://example.com/article"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Featured Image URL (Optional)
                        </label>
                        <input type="url"
                            name="featured_image"
                            id="featured_image"
                            value="{{ old('featured_image') }}"
                            placeholder="https://example.com/image.jpg"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Tags (Optional)
                        </label>
                        <input type="text"
                            name="tags"
                            id="tags"
                            value="{{ old('tags') }}"
                            placeholder="e.g., ai, business, technology (comma-separated)"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; transition: opacity 0.3s; width: 100%;">
                        <i class="fas fa-plus"></i> Publish Article
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Articles List -->
    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h3 style="color: var(--blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-list"></i> Your Articles ({{ $articles->count() }})
        </h3>

        @if ($articles->isEmpty())
            <div style="text-align: center; padding: 3rem 2rem; color: #999;">
                <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                <p style="font-size: 1.1rem;">No articles yet. Share your first article above!</p>
            </div>
        @else
            <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;">
                @foreach ($articles as $article)
                    <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 8px; border-left: 4px solid var(--orange); display: grid; grid-template-columns: 1fr; gap: 1rem;">
                        @if ($article->featured_image)
                            <img src="{{ $article->featured_image }}" alt="{{ $article->title }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 4px;">
                        @endif
                        
                        <div>
                            <h4 style="color: var(--blue); margin: 0 0 0.5rem 0; font-size: 1.2rem;">{{ $article->title }}</h4>
                            
                            @if ($article->subtitle)
                                <p style="color: #999; font-size: 0.9rem; margin: 0 0 0.5rem 0; font-style: italic;">{{ $article->subtitle }}</p>
                            @endif
                            
                            <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 1rem; font-size: 0.85rem; color: #666;">
                                <span><i class="fas fa-calendar"></i> {{ $article->publication_date ? $article->publication_date->format('M d, Y') : $article->created_at->format('M d, Y') }}</span>
                                @if ($article->source)
                                    <span><i class="fas fa-bookmark"></i> {{ $article->source }}</span>
                                @endif
                            </div>

                            @if ($article->tags)
                                <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                                    @foreach (explode(',', $article->tags) as $tag)
                                        <span style="background: #e8f0ff; color: var(--blue); padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.8rem;">#{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <p style="color: #666; margin: 0 0 1rem 0; line-height: 1.6;">
                                {{ substr(strip_tags($article->content), 0, 200) }}{{ strlen(strip_tags($article->content)) > 200 ? '...' : '' }}
                            </p>
                        </div>

                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            @if ($article->external_link)
                                <a href="{{ $article->external_link }}" target="_blank" rel="noopener noreferrer"
                                    style="flex: 1; background: var(--blue); color: white; padding: 0.5rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem; text-align: center; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                    <i class="fas fa-external-link-alt"></i> Read
                                </a>
                            @endif
                            <a href="{{ route('articles.edit', $article->id) }}"
                                style="flex: 1; background: var(--blue); color: white; padding: 0.5rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem; text-align: center; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form id="deleteForm_{{ $article->id }}" action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline; flex: 1;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" onclick="openDeleteModal(document.getElementById('deleteForm_{{ $article->id }}'))"
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

<!-- Delete Modal -->
<div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: white; padding: 2rem; border-radius: 8px; max-width: 400px; width: 90%;">
        <h3 style="color: var(--blue); margin: 0 0 1rem 0;">Confirm Delete</h3>
        <p style="color: #666; margin: 0 0 1.5rem 0;">Are you sure you want to delete this article? This action cannot be undone.</p>
        <div style="display: flex; gap: 1rem; justify-content: flex-end;">
            <button onclick="closeDeleteModal()" style="padding: 0.5rem 1.5rem; border: 1px solid #ddd; background: white; color: #333; border-radius: 4px; cursor: pointer;">
                Cancel
            </button>
            <button onclick="confirmDelete()" style="padding: 0.5rem 1.5rem; background: #c33; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Delete
            </button>
        </div>
    </div>
</div>

<script>
    let deleteFormToSubmit = null;

    function openDeleteModal(form) {
        deleteFormToSubmit = form;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
        deleteFormToSubmit = null;
    }

    function confirmDelete() {
        if (deleteFormToSubmit) {
            deleteFormToSubmit.submit();
        }
    }

    // Close modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });

    // Quill Editor Setup
    const script = document.createElement('script');
    script.src = 'https://cdn.quilljs.com/1.3.6/quill.js';
    document.head.appendChild(script);

    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'https://cdn.quilljs.com/1.3.6/quill.snow.css';
    document.head.appendChild(link);

    script.onload = function() {
        const articleEditor = new Quill('#articleEditor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'header': 1 }, { 'header': 2 }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'header': [false, 1, 2, 3, 4, 5, 6] }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
            placeholder: 'Write your article content here...'
        });

        // Sync editor content to hidden input on form submit
        const form = articleEditor.root.closest('form');
        if (form) {
            form.addEventListener('submit', function() {
                document.getElementById('content').value = articleEditor.root.innerHTML;
            });
        }
    };
</script>
@endsection
