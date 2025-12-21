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

            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
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

                    <!-- Project URL -->
                    <div>
                        <label for="url" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Project URL (Optional)
                        </label>
                        <input type="url"
                            name="url"
                            id="url"
                            value="{{ old('url') }}"
                            placeholder="https://example.com"
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

                    <!-- Project Image -->
                    <div>
                        <label for="image" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            Project Image (Optional)
                        </label>
                        <input type="file"
                            name="image"
                            id="image"
                            accept="image/*"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        <small style="color: #666; display: block; margin-top: 0.25rem;">Max 2MB</small>
                    </div>

                    <!-- Project PDF -->
                    <div>
                        <label for="pdf" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                            PDF Presentation (Optional)
                        </label>
                        <input type="file"
                            name="pdf"
                            id="pdf"
                            accept=".pdf"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                        <small style="color: #666; display: block; margin-top: 0.25rem;">Max 5MB, PDF only</small>
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

                <!-- Description -->
                <div style="margin-bottom: 2rem;">
                    <label for="description" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Description (Optional)
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
                <button type="submit"
                    style="background: var(--orange); color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; transition: opacity 0.3s;">
                    <i class="fas fa-plus"></i> Add Project
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

                            <!-- Project URL / PDF Action -->
                            @if ($project->url || $project->pdf)
                                <a href="{{ $project->url ? $project->url : asset('storage/' . $project->pdf) }}" target="_blank" style="color: white; background: var(--blue); text-decoration: none; padding: 0.5rem 1rem; border-radius: 4px; display: flex; align-items: center; justify-content: center; gap: 0.5rem; margin-bottom: 1rem; font-weight: 500;">
                                    @if ($project->url)
                                        <i class="fas fa-external-link-alt"></i> View Project
                                    @else
                                        <i class="fas fa-file-pdf"></i> Download Presentation
                                    @endif
                                </a>
                            @endif

                            <!-- Actions -->
                            <div style="display: flex; gap: 0.5rem; justify-content: space-between;">
                                <button onclick="editProject({{ $project->id }}, '{{ $project->title }}', '{{ $project->description }}', '{{ $project->url }}', '{{ $project->status }}', [{{ $project->skills->pluck('id')->join(',') }}])"
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
                    <label for="editUrl" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        Project URL
                    </label>
                    <input type="url"
                        id="editUrl"
                        name="url"
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
                        Description
                    </label>
                    <textarea
                        id="editDescription"
                        name="description"
                        maxlength="500"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 100px; font-family: inherit; box-sizing: border-box;"></textarea>
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
                        Project Image
                    </label>
                    <input type="file"
                        id="editImage"
                        name="image"
                        accept="image/*"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Max 2MB (leave empty to keep current)</small>
                </div>

                <div>
                    <label for="editPdf" style="display: block; font-weight: bold; color: var(--blue); margin-bottom: 0.5rem;">
                        PDF Presentation
                    </label>
                    <input type="file"
                        id="editPdf"
                        name="pdf"
                        accept=".pdf"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
                    <small style="color: #666; display: block; margin-top: 0.25rem;">Max 5MB, PDF only (leave empty to keep current)</small>
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
        function editProject(id, title, description, url, status, skillIds = []) {
            document.getElementById('editTitle').value = title;
            document.getElementById('editUrl').value = url;
            document.getElementById('editStatus').value = status;
            document.getElementById('editDescription').value = description;
            document.getElementById('editForm').action = `/projects/${id}`;
            
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

        // Close modal when clicking outside
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>
@endsection
