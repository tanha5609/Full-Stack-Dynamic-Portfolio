<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project - Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .admin-header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-header h1 {
            color: #0077b6;
            font-size: 1.5rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: #0077b6;
            text-decoration: none;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .main-content {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .content-header {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-grid.single {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #333;
        }

        input, textarea, select {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #0077b6;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #eee;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            display: inline-block;
        }

        .btn-primary {
            background: #0077b6;
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .help-text {
            font-size: 0.85rem;
            color: #666;
            margin-top: 0.25rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div>
            <h1>Edit Project</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> / 
                <a href="{{ route('admin.projects.index') }}">Projects</a> / Edit
            </div>
        </div>
        <div class="user-info">
            <span>{{ Auth::guard('admin')->user()->name }}</span>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </header>

    <div class="main-content">
        <div class="content-header">
            <h2>Edit Project: {{ $project->title }}</h2>
            <p>Update project information</p>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('admin.projects.update', $project) }}">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label for="title">Project Title *</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $project->image_url) }}">
                        <div class="help-text">URL to project screenshot or image</div>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
                    <div class="help-text">Detailed description of the project</div>
                </div>

                <div class="form-group full-width">
                    <label for="technologies">Technologies Used</label>
                    <input type="text" id="technologies" name="technologies" value="{{ old('technologies', is_array($project->technologies) ? implode(', ', $project->technologies) : $project->technologies) }}">
                    <div class="help-text">Comma-separated list of technologies (e.g., Laravel, Vue.js, MySQL)</div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="github_url">GitHub URL</label>
                        <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}">
                    </div>
                    <div class="form-group">
                        <label for="live_url">Live Demo URL</label>
                        <input type="url" id="live_url" name="live_url" value="{{ old('live_url', $project->live_url) }}">
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="completion_date">Completion Date</label>
                        <input type="date" id="completion_date" name="completion_date" value="{{ old('completion_date', $project->completion_date ? $project->completion_date->format('Y-m-d') : '') }}">
                    </div>
                    <div class="form-group">
                        <label for="order">Display Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $project->order) }}" min="0">
                        <div class="help-text">Lower numbers appear first</div>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                            <label for="is_featured">Featured Project</label>
                        </div>
                        <div class="help-text">Featured projects appear prominently</div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                            <label for="is_active">Active</label>
                        </div>
                        <div class="help-text">Only active projects are shown publicly</div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
