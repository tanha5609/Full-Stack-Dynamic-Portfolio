<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects - Admin Panel</title>
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
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .content-header {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-btn {
            background: #28a745;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }

        .project-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }

        .project-card:hover {
            transform: translateY(-2px);
        }

        .project-image {
            width: 100%;
            height: 200px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-content {
            padding: 1.5rem;
        }

        .project-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .project-title {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .project-desc {
            color: #666;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .technologies {
            margin-bottom: 1rem;
        }

        .tech-tag {
            background: #007bff;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-right: 0.5rem;
            margin-bottom: 0.25rem;
            display: inline-block;
        }

        .project-links {
            margin-bottom: 1rem;
        }

        .project-link {
            color: #0077b6;
            text-decoration: none;
            font-size: 0.9rem;
            margin-right: 1rem;
        }

        .project-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-block;
        }

        .btn-edit {
            background: #007bff;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-toggle {
            background: #6c757d;
            color: white;
        }

        .btn-feature {
            background: #ffc107;
            color: #212529;
        }

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .featured-badge {
            background: #fff3cd;
            color: #856404;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-left: 0.5rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .empty-state h3 {
            margin-bottom: 1rem;
            color: #333;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div>
            <h1>Projects Management</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> / Projects
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
            <div>
                <h2>Manage Projects</h2>
                <p>Add and manage your portfolio projects</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="add-btn">+ Add Project</a>
        </div>

        @if($projects->count() > 0)
            <div class="projects-grid">
                @foreach($projects as $project)
                    <div class="project-card">
                        <div class="project-image">
                            @if($project->image_url)
                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                            @else
                                <span>No Image</span>
                            @endif
                        </div>
                        
                        <div class="project-content">
                            <div class="project-header">
                                <div>
                                    <div class="project-title">
                                        {{ $project->title }}
                                        @if($project->is_featured)
                                            <span class="featured-badge">Featured</span>
                                        @endif
                                    </div>
                                </div>
                                <span class="status-badge {{ $project->is_active ? 'status-active' : 'status-inactive' }}">
                                    {{ $project->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>

                            @if($project->description)
                                <div class="project-desc">{{ Str::limit($project->description, 100) }}</div>
                            @endif

                            @if($project->technologies)
                                <div class="technologies">
                                    @if(is_array($project->technologies))
                                        @foreach($project->technologies as $tech)
                                            <span class="tech-tag">{{ $tech }}</span>
                                        @endforeach
                                    @else
                                        @foreach(explode(',', $project->technologies) as $tech)
                                            <span class="tech-tag">{{ trim($tech) }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endif

                            <div class="project-links">
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" class="project-link" target="_blank">GitHub</a>
                                @endif
                                @if($project->live_url)
                                    <a href="{{ $project->live_url }}" class="project-link" target="_blank">Live Demo</a>
                                @endif
                            </div>

                            <div class="project-actions">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-edit">Edit</a>
                                <form method="POST" action="{{ route('admin.projects.toggle-featured', $project) }}" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-feature">
                                        {{ $project->is_featured ? 'Unfeature' : 'Feature' }}
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.projects.toggle-status', $project) }}" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-toggle">
                                        {{ $project->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No Projects Found</h3>
                <p>Start by adding your portfolio projects.</p>
                <a href="{{ route('admin.projects.create') }}" class="add-btn">Add Project</a>
            </div>
        @endif
    </div>
</body>
</html>
