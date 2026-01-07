@extends('layouts.app')

@section('title', 'Portfolio')

@section('meta_description', 'Manage your portfolio projects')

@section('meta_keywords', 'portfolio, projects, work, case studies')

@section('body_class', 'layout-with-sidebar')

@section('useSidebar', '1')

@section('content')
    <!-- Include Success Modal Component -->
    @include('layouts.partials.success-modal')
    
    <!-- Include Delete Modal Component -->
    @include('layouts.partials.delete-modal')

    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="color: var(--blue); margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-rocket"></i> Portfolio Projects
        </h2>

        <!-- Add New Project Form -->
        <div style="background: #f9f9f9; padding: 2rem; border-radius: 8px; border: 1px solid #eee; margin-bottom: 2rem;">
            <h3 style="color: var(--blue); margin-bottom: 1.5rem; font-size: 1.1rem;">
                <i class="fas fa-plus-circle"></i> Add New Project
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

            <form id="addProjectForm" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <!-- Project Title -->
                    <div>
                        <label for="title" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Project Title *
                        </label>
                        <input type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            placeholder="e.g., E-Commerce Platform"
                            required
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Status *
                        </label>
                        <select name="status" id="status" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                            <option value="">Select Status</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="planned" {{ old('status') == 'planned' ? 'selected' : '' }}>Planned</option>
                        </select>
                    </div>

                    <!-- Project Date -->
                    <div>
                        <label for="project_date" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Project Date (Optional)
                        </label>
                        <input type="date"
                            name="project_date"
                            id="project_date"
                            value="{{ old('project_date') }}"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Project Duration -->
                    <div>
                        <label for="project_duration" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Project Duration (Optional)
                        </label>
                        <input type="text"
                            name="project_duration"
                            id="project_duration"
                            value="{{ old('project_duration') }}"
                            placeholder="e.g., 3 months, 2024 Q1"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Progress -->
                    <div>
                        <label for="progress" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Progress (%)
                        </label>
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <div style="display: flex; align-items: center; justify-content: space-between; font-size: 0.9rem; color: #555;">
                                <span>0%</span>
                                <span id="progressValue">{{ old('progress', 0) }}%</span>
                                <span>100%</span>
                            </div>
                            <input type="range"
                                name="progress"
                                id="progress"
                                min="0"
                                max="100"
                                value="{{ old('progress', 0) }}"
                                style="width: 100%;">
                            <div style="width: 100%; height: 8px; background: #eee; border-radius: 999px; overflow: hidden;">
                                <div id="progressBarFill" style="height: 100%; width: {{ old('progress', 0) }}%; background: linear-gradient(90deg, var(--orange), var(--blue)); transition: width 0.2s ease-out;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Client / Company -->
                    <div>
                        <label for="client_name" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Client / Company (Optional)
                        </label>
                        <input type="text"
                            name="client_name"
                            id="client_name"
                            value="{{ old('client_name') }}"
                            placeholder="e.g., Acme Corp."
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Category (Optional)
                        </label>
                        <input type="text"
                            name="category"
                            id="category"
                            value="{{ old('category') }}"
                            placeholder="e.g., Web App, Branding"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <!-- Project Image -->
                    <div>
                        <label for="image" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Cover Image (Optional)
                        </label>
                        <input type="file"
                            name="image"
                            id="image"
                            accept="image/*"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        <small style="color: #666; display: block; margin-top: 0.25rem;">Max 2MB</small>
                    </div>

                    <!-- Project Video Upload -->
                    <div>
                        <label for="video" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Project Video Upload (Optional)
                        </label>
                        <input type="file"
                            name="video"
                            id="video"
                            accept="video/*"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        <small style="color: #666; display: block; margin-top: 0.25rem;">Max 50MB, MP4/WEBM</small>
                    </div>
                </div>

                <!-- Video Embed URL & Gallery -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <div>
                        <label for="video_url" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Video Embed URL (Optional)
                        </label>
                        <input type="url"
                            name="video_url"
                            id="video_url"
                            value="{{ old('video_url') }}"
                            placeholder="YouTube or Vimeo embed URL"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        <small style="color: #666; display: block; margin-top: 0.25rem;">Use an embeddable URL (e.g., https://www.youtube.com/embed/...) for best results.</small>
                    </div>

                    <div>
                        <label for="gallery_images" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Image Gallery (Optional)
                        </label>
                        <input type="file"
                            name="gallery_images[]"
                            id="gallery_images"
                            accept="image/*"
                            multiple
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        <small style="color: #666; display: block; margin-top: 0.25rem;">Hold Ctrl / Cmd or Shift to select multiple images at once, or use the picker repeatedly.</small>
                        <div id="gallery_images_preview" style="margin-top: 0.75rem; display: flex; flex-wrap: wrap; gap: 0.5rem;"></div>
                    </div>
                </div>

                <!-- Skills -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 1rem;">
                        Skills Used (Optional)
                    </label>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                        @forelse ($skills as $skill)
                            <label style="display: inline-block; cursor: pointer;">
                                <input type="checkbox"
                                    name="skills[]"
                                    value="{{ $skill->id }}"
                                    style="display: none;">
                                <span style="display: inline-block; color: #333; font-size: 0.95rem; padding: 0.5rem 1rem; border: 1px solid #ddd; border-radius: 4px; background: white; transition: all 0.2s; cursor: pointer;">{{ $skill->name }}</span>
                            </label>
                        @empty
                            <p style="color: #999; font-size: 0.9rem;">No skills yet. <a href="{{ route('skills.index') }}" style="color: var(--blue); text-decoration: underline;">Create skills first</a></p>
                        @endforelse
                    </div>
                </div>

                <style>
                    input[type="checkbox"]:checked + span {
                        background: var(--blue) !important;
                        color: white !important;
                        border-color: var(--blue) !important;
                    }

                    input[type="checkbox"]:not(:checked) + span:hover {
                        background: #f5f5f5;
                        border-color: var(--blue);
                    }
                </style>

                <!-- Detailed Summary -->
                <div style="margin-bottom: 2rem;">
                    <label for="summary" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Detailed Project Summary (Optional)
                    </label>
                    <textarea
                        name="summary"
                        id="summary"
                        placeholder="Describe the project goals, process, and outcomes in detail..."
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 140px; font-family: inherit; box-sizing: border-box; resize: vertical;">{{ old('summary') }}</textarea>
                </div>

                <!-- 3D Project File -->
                <div style="margin-bottom: 2rem;">
                    <label for="model_file" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        3D Project File (Optional)
                    </label>
                    <input type="file"
                        name="model_file"
                        id="model_file"
                        accept=".fbx,.obj,.blend,.gltf,.glb"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Supported for web preview: GLTF/GLB, OBJ, FBX. BLEND files will upload but cannot be previewed directly.</small>
                </div>

                <!-- 3D Embed Code (e.g., Sketchfab) -->
                <div style="margin-bottom: 2rem;">
                    <label for="model_embed" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        3D Embed Code (Optional)
                    </label>
                    <textarea
                        name="model_embed"
                        id="model_embed"
                        placeholder="Paste 3D viewer embed code here (e.g., Sketchfab iframe)"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 0.9rem; min-height: 100px; font-family: monospace; box-sizing: border-box; resize: vertical;">{{ old('model_embed') }}</textarea>
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Example: the full &lt;iframe&gt; / embed snippet from Sketchfab or other 3D hosting.</small>
                </div>

                <!-- Short Description -->
                <div style="margin-bottom: 2rem;">
                    <label for="description" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Short Description (Optional)
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        placeholder="Describe your project..."
                        maxlength="500"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 100px; font-family: inherit; box-sizing: border-box; resize: vertical;">{{ old('description') }}</textarea>
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Max 500 characters</small>
                </div>

                <!-- Submit Button -->
                <button id="addProjectSubmitBtn" type="submit"
                    style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; transition: opacity 0.3s; display: inline-flex; align-items: center; gap: 0.5rem;">
                    <span class="add-project-submit-text"><i class="fas fa-plus"></i> Add Project</span>
                    <span class="add-project-loading-spinner" style="display: none; width: 16px; height: 16px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.5); border-top-color: white; animation: spin 0.8s linear infinite;"></span>
                </button>
            </form>
        </div>
    </div>

    <!-- Projects Grid -->
    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h3 style="color: var(--blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-list"></i> Your Projects ({{ $projects->count() }})
        </h3>

        @if ($projects->isEmpty())
            <div style="text-align: center; padding: 3rem 2rem; color: #999;">
                <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                <p style="font-size: 1.1rem;">No projects yet. Create your first project above!</p>
            </div>
        @else
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                @foreach ($projects as $project)
                    <div style="background: #f9f9f9; border-radius: 8px; overflow: hidden; border: 1px solid #eee; transition: transform 0.3s, box-shadow 0.3s;">
                        <!-- Project Image -->
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                style="width: 100%; height: 200px; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 200px; background: linear-gradient(135deg, var(--blue), var(--orange)); display: flex; align-items: center; justify-content: center; color: white;">
                                <i class="fas fa-image" style="font-size: 3rem;"></i>
                            </div>
                        @endif

                        <!-- Project Info -->
                        <div style="padding: 1.5rem;">
                            <h4 style="color: var(--blue); margin: 0 0 0.5rem 0; font-size: 1.1rem;">
                                {{ $project->title }}
                            </h4>

                            <!-- Status Badge -->
                            <div style="margin-bottom: 1rem;">
                                @if ($project->status === 'completed')
                                    <span style="background: #4caf50; color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                        <i class="fas fa-check"></i> Completed
                                    </span>
                                @elseif ($project->status === 'in_progress')
                                    <span style="background: var(--orange); color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                        <i class="fas fa-spinner"></i> In Progress
                                    </span>
                                @else
                                    <span style="background: #999; color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                        <i class="fas fa-calendar"></i> Planned
                                    </span>
                                @endif
                            </div>

                            <!-- Description -->
                            <p style="color: #666; font-size: 0.95rem; margin: 1rem 0; line-height: 1.5;">
                                {{ $project->description ? substr($project->description, 0, 80) . (strlen($project->description) > 80 ? '...' : '') : 'No description' }}
                            </p>

                            <!-- Skills Tags -->
                            @if ($project->skills->count() > 0)
                                <div style="margin-bottom: 1rem; display: flex; flex-wrap: wrap; gap: 0.5rem;">
                                    @foreach ($project->skills as $skill)
                                        <span style="background: #e3f2fd; color: var(--blue); padding: 0.25rem 0.75rem; border-radius: 4px; font-size: 0.8rem; font-weight: 500;">
                                            {{ $skill->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Actions -->
                            <div style="display: flex; gap: 0.5rem; justify-content: space-between;">
                                <button type="button"
                                    onclick="editProject(this)"
                                    data-id="{{ $project->id }}"
                                    data-title="{{ $project->title }}"
                                    data-description="{{ $project->description }}"
                                    data-summary="{{ $project->summary }}"
                                    data-status="{{ $project->status }}"
                                    data-project-date="{{ $project->project_date ? $project->project_date->format('Y-m-d') : '' }}"
                                    data-project-duration="{{ $project->project_duration }}"
                                    data-progress="{{ $project->progress ?? 0 }}"
                                    data-client-name="{{ $project->client_name }}"
                                    data-category="{{ $project->category }}"
                                    data-video-url="{{ $project->video_url }}"
                                    data-model-embed="{{ e($project->model_embed) }}"
                                    data-skills='@json($project->skills->pluck("id"))'
                                    style="flex: 1; background: var(--blue); color: white; padding: 0.5rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem; text-decoration: none;">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form id="deleteForm_{{ $project->id }}" action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" onclick="openDeleteModal(document.getElementById('deleteForm_{{ $project->id }}'))"
                                    style="flex: 1; background: #c33; color: white; padding: 0.5rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem;">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                <i class="fas fa-edit"></i> Edit Project
            </h2>

            <form id="editForm" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1.5rem;">
                @csrf
                @method('PUT')

                <div>
                    <label for="editTitle" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Project Title
                    </label>
                    <input type="text"
                        id="editTitle"
                        name="title"
                        required
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                </div>

                <div>
                    <label for="editStatus" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Status
                    </label>
                    <select id="editStatus" name="status" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        <option value="completed">Completed</option>
                        <option value="in_progress">In Progress</option>
                        <option value="planned">Planned</option>
                    </select>
                </div>

                <div>
                    <label for="editDescription" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Short Description
                    </label>
                    <textarea
                        id="editDescription"
                        name="description"
                        maxlength="500"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 100px; font-family: inherit; box-sizing: border-box;"></textarea>
                </div>

                <div>
                    <label for="editSummary" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Detailed Project Summary
                    </label>
                    <textarea
                        id="editSummary"
                        name="summary"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 140px; font-family: inherit; box-sizing: border-box;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="editProjectDate" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Project Date
                        </label>
                        <input type="date"
                            id="editProjectDate"
                            name="project_date"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <div>
                        <label for="editProjectDuration" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Project Duration
                        </label>
                        <input type="text"
                            id="editProjectDuration"
                            name="project_duration"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>
                    <div>
                        <label for="editProgress" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Progress (%)
                        </label>
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <div style="display: flex; align-items: center; justify-content: space-between; font-size: 0.9rem; color: #555;">
                                <span>0%</span>
                                <span id="editProgressValue">0%</span>
                                <span>100%</span>
                            </div>
                            <input type="range"
                                id="editProgress"
                                name="progress"
                                min="0"
                                max="100"
                                value="0"
                                style="width: 100%;">
                            <div style="width: 100%; height: 8px; background: #eee; border-radius: 999px; overflow: hidden;">
                                <div id="editProgressBarFill" style="height: 100%; width: 0%; background: linear-gradient(90deg, var(--orange), var(--blue)); transition: width 0.2s ease-out;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="editModelEmbed" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        3D Embed Code
                    </label>
                    <textarea
                        id="editModelEmbed"
                        name="model_embed"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 0.9rem; min-height: 100px; font-family: monospace; box-sizing: border-box; resize: vertical;"></textarea>
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Paste the embed HTML from Sketchfab or similar (iframe snippet).</small>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="editClientName" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Client / Company
                        </label>
                        <input type="text"
                            id="editClientName"
                            name="client_name"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>

                    <div>
                        <label for="editCategory" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Category
                        </label>
                        <input type="text"
                            id="editCategory"
                            name="category"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    </div>
                </div>

                <div>
                    <label for="editVideoUrl" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Video Embed URL
                    </label>
                    <input type="url"
                        id="editVideoUrl"
                        name="video_url"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Use an embeddable URL (e.g., https://www.youtube.com/embed/...).</small>
                </div>

                <div>
                    <label style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Skills Used
                    </label>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                        @forelse ($skills as $skill)
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox"
                                    name="skills[]"
                                    value="{{ $skill->id }}"
                                    class="editSkillCheckbox"
                                    style="width: 18px; height: 18px; cursor: pointer;">
                                <span style="color: #333; font-size: 0.95rem;">{{ $skill->name }}</span>
                            </label>
                        @empty
                            <p style="color: #999; font-size: 0.9rem;">No skills available</p>
                        @endforelse
                    </div>
                </div>

                <div>
                    <label for="editImage" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Cover Image
                    </label>
                    <input type="file"
                        id="editImage"
                        name="image"
                        accept="image/*"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Max 2MB (leave empty to keep current)</small>
                </div>

                <div>
                    <label for="editVideo" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Project Video Upload
                    </label>
                    <input type="file"
                        id="editVideo"
                        name="video"
                        accept="video/*"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Max 50MB, MP4/WEBM (leave empty to keep current)</small>
                </div>

                <div>
                    <label for="editModelFile" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        3D Project File
                    </label>
                    <input type="file"
                        id="editModelFile"
                        name="model_file"
                        accept=".fbx,.obj,.blend,.gltf,.glb"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Upload a new GLTF/GLB, OBJ, or FBX to replace the current one (BLEND files will upload but cannot be previewed directly; leave empty to keep current).</small>
                </div>

                <div>
                    <label for="editGalleryImages" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Add Gallery Images
                    </label>
                    <input type="file"
                        id="editGalleryImages"
                        name="gallery_images[]"
                        accept="image/*"
                        multiple
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">You can select multiple images to append to the existing gallery.</small>
                    <div id="edit_gallery_images_preview" style="margin-top: 0.75rem; display: flex; flex-wrap: wrap; gap: 0.5rem;"></div>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button type="button"
                        onclick="closeEditModal()"
                        style="background: #ccc; color: #333; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                        Cancel
                    </button>
                    <button id="editProjectSubmitBtn" type="submit"
                        style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; display: inline-flex; align-items: center; gap: 0.5rem;">
                        <span class="edit-project-submit-text"><i class="fas fa-save"></i> Save Changes</span>
                        <span class="edit-project-loading-spinner" style="display: none; width: 16px; height: 16px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.5); border-top-color: white; animation: spin 0.8s linear infinite;"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Global Loading Overlay for Project Submit -->
    <div id="projectLoadingOverlay" style="position: fixed; inset: 0; background: rgba(0,0,0,0.55); display: none; align-items: center; justify-content: center; z-index: 2000;">
        <div style="background: #111827; color: white; padding: 1.5rem 2rem; border-radius: 12px; box-shadow: 0 20px 45px rgba(0,0,0,0.45); display: flex; flex-direction: column; align-items: center; gap: 0.75rem; min-width: 260px; text-align: center;">
            <div style="width: 32px; height: 32px; border-radius: 50%; border: 3px solid rgba(255,255,255,0.3); border-top-color: #f97316; animation: spin 0.8s linear infinite;"></div>
            <div style="font-weight: 600; font-size: 0.95rem;">Uploading project files...</div>
            <div style="font-size: 0.8rem; color: #d1d5db;">Please wait while we save your project.</div>
        </div>
    </div>

    <script>
        // Simple spinner animation keyframes
        const styleEl = document.createElement('style');
        styleEl.innerHTML = '@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }';
        document.head.appendChild(styleEl);

        function editProject(button) {
            const projectId = button.dataset.id;
            const skillsJson = button.dataset.skills || '[]';
            let skillIds = [];
            try {
                skillIds = JSON.parse(skillsJson);
            } catch (e) {
                skillIds = [];
            }

            document.getElementById('editTitle').value = button.dataset.title || '';
            document.getElementById('editStatus').value = button.dataset.status || '';
            document.getElementById('editDescription').value = button.dataset.description || '';
            document.getElementById('editSummary').value = button.dataset.summary || '';
            document.getElementById('editProjectDate').value = button.dataset.projectDate || '';
            document.getElementById('editProjectDuration').value = button.dataset.projectDuration || '';
            const progressValue = parseInt(button.dataset.progress || '0', 10) || 0;
            const editProgressInput = document.getElementById('editProgress');
            const editProgressValue = document.getElementById('editProgressValue');
            const editProgressBarFill = document.getElementById('editProgressBarFill');
            if (editProgressInput && editProgressValue && editProgressBarFill) {
                editProgressInput.value = progressValue;
                editProgressValue.textContent = progressValue + '%';
                editProgressBarFill.style.width = progressValue + '%';
            }
            document.getElementById('editModelEmbed').value = button.dataset.modelEmbed || '';
            document.getElementById('editClientName').value = button.dataset.clientName || '';
            document.getElementById('editCategory').value = button.dataset.category || '';
            document.getElementById('editVideoUrl').value = button.dataset.videoUrl || '';
            document.getElementById('editForm').action = `/projects/${projectId}`;
            
            // Uncheck all skill checkboxes
            document.querySelectorAll('.editSkillCheckbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            
            // Check selected skills
            if (skillIds && skillIds.length > 0) {
                skillIds.forEach(skillId => {
                    const checkbox = document.querySelector(`.editSkillCheckbox[value="${skillId}"]`);
                    if (checkbox) checkbox.checked = true;
                });
            }
            
            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Basic filename previews for gallery inputs
        function setupGalleryPreview(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            if (!input || !preview) return;

            input.addEventListener('change', function () {
                preview.innerHTML = '';
                if (!this.files || !this.files.length) return;

                Array.from(this.files).forEach(file => {
                    const badge = document.createElement('span');
                    badge.textContent = file.name;
                    badge.style.display = 'inline-block';
                    badge.style.fontSize = '0.8rem';
                    badge.style.padding = '0.25rem 0.5rem';
                    badge.style.borderRadius = '4px';
                    badge.style.background = '#f5f5f5';
                    badge.style.border = '1px solid #ddd';
                    preview.appendChild(badge);
                });
            });
        }

        setupGalleryPreview('gallery_images', 'gallery_images_preview');
        setupGalleryPreview('editGalleryImages', 'edit_gallery_images_preview');

        // Live progress bar updates for create form
        (function () {
            const progressInput = document.getElementById('progress');
            const progressValue = document.getElementById('progressValue');
            const progressBarFill = document.getElementById('progressBarFill');
            if (progressInput && progressValue && progressBarFill) {
                progressInput.addEventListener('input', function () {
                    const val = parseInt(this.value || '0', 10) || 0;
                    progressValue.textContent = val + '%';
                    progressBarFill.style.width = val + '%';
                });
            }
        })();

        // Live progress bar updates for edit form
        (function () {
            const editProgressInput = document.getElementById('editProgress');
            const editProgressValue = document.getElementById('editProgressValue');
            const editProgressBarFill = document.getElementById('editProgressBarFill');
            if (editProgressInput && editProgressValue && editProgressBarFill) {
                editProgressInput.addEventListener('input', function () {
                    const val = parseInt(this.value || '0', 10) || 0;
                    editProgressValue.textContent = val + '%';
                    editProgressBarFill.style.width = val + '%';
                });
            }
        })();

        // Close modal when clicking outside
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        // Show loading indicator on heavy project form submits
        (function () {
            const overlay = document.getElementById('projectLoadingOverlay');
            const addForm = document.getElementById('addProjectForm');
            const editForm = document.getElementById('editForm');
            const addBtn = document.getElementById('addProjectSubmitBtn');
            const editBtn = document.getElementById('editProjectSubmitBtn');

            function startLoading(button, type) {
                if (overlay) {
                    overlay.style.display = 'flex';
                }
                if (!button) return;

                button.disabled = true;
                const submitText = button.querySelector('.' + type + '-submit-text');
                const spinner = button.querySelector('.' + type + '-loading-spinner');
                if (submitText) {
                    submitText.textContent = type === 'add-project' ? 'Adding Project...' : 'Saving...';
                }
                if (spinner) {
                    spinner.style.display = 'inline-block';
                }
            }

            if (addForm) {
                addForm.addEventListener('submit', function () {
                    startLoading(addBtn, 'add-project');
                });
            }

            if (editForm) {
                editForm.addEventListener('submit', function () {
                    startLoading(editBtn, 'edit-project');
                });
            }
        })();
    </script>
@endsection
