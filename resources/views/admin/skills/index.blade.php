<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Skills - Admin Panel</title>
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

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .skill-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .skill-header {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }

        .skill-icon {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            margin-right: 1rem;
            object-fit: contain;
        }

        .skill-title {
            font-weight: 600;
            color: #333;
        }

        .skill-body {
            padding: 1rem;
        }

        .skill-desc {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .skill-actions {
            display: flex;
            gap: 0.5rem;
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

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
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
            <h1>Skills Management</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> / Skills
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
                <h2>Manage Skills</h2>
                <p>Add, edit, and organize your technical skills</p>
            </div>
            <a href="{{ route('admin.skills.create') }}" class="add-btn">+ Add New Skill</a>
        </div>

        @if($skills->count() > 0)
            <div class="skills-grid">
                @foreach($skills as $skill)
                    <div class="skill-card">
                        <div class="skill-header">
                            <img src="{{ $skill->image_url }}" alt="{{ $skill->name }}" class="skill-icon">
                            <div>
                                <h3 class="skill-title">{{ $skill->name }}</h3>
                                <span class="status-badge {{ $skill->is_active ? 'status-active' : 'status-inactive' }}">
                                    {{ $skill->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                        <div class="skill-body">
                            <p class="skill-desc">{{ Str::limit($skill->description, 100) }}</p>
                            <div class="skill-actions">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-edit">Edit</a>
                                <form method="POST" action="{{ route('admin.skills.toggle-status', $skill) }}" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-toggle">
                                        {{ $skill->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this skill?')">
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
                <h3>No Skills Found</h3>
                <p>Start by adding your first skill to showcase your expertise.</p>
                <a href="{{ route('admin.skills.create') }}" class="add-btn">Add Your First Skill</a>
            </div>
        @endif
    </div>
</body>
</html>
