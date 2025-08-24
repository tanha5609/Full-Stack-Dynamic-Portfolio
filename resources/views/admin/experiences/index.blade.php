<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Experiences - Admin Panel</title>
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

        .experience-list {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .experience-item {
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .experience-item:last-child {
            border-bottom: none;
        }

        .experience-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .experience-title {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
        }

        .experience-company {
            color: #0077b6;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .experience-period {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .experience-type {
            background: #e9ecef;
            color: #495057;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            display: inline-block;
        }

        .experience-desc {
            color: #666;
            line-height: 1.5;
            margin-top: 0.75rem;
        }

        .technologies {
            margin-top: 0.75rem;
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

        .experience-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
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
            <h1>Experience Management</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> / Experience
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
                <h2>Manage Experience</h2>
                <p>Add and manage your professional experience</p>
            </div>
            <a href="{{ route('admin.experiences.create') }}" class="add-btn">+ Add Experience</a>
        </div>

        @if($experiences->count() > 0)
            <div class="experience-list">
                @foreach($experiences as $exp)
                    <div class="experience-item">
                        <div class="experience-header">
                            <div>
                                <div class="experience-company">{{ $exp->company }}</div>
                                <div class="experience-title">{{ $exp->position }}</div>
                                <div class="experience-period">
                                    {{ $exp->start_date->format('M Y') }} - 
                                    {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                                </div>
                                @if($exp->employment_type)
                                    <span class="experience-type">{{ $exp->employment_type }}</span>
                                @endif
                            </div>
                            <div>
                                <span class="status-badge {{ $exp->is_active ? 'status-active' : 'status-inactive' }}">
                                    {{ $exp->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>

                        @if($exp->description)
                            <div class="experience-desc">{{ $exp->description }}</div>
                        @endif

                        @if($exp->technologies)
                            <div class="technologies">
                                @if(is_array($exp->technologies))
                                    @foreach($exp->technologies as $tech)
                                        <span class="tech-tag">{{ $tech }}</span>
                                    @endforeach
                                @else
                                    @foreach(explode(',', $exp->technologies) as $tech)
                                        <span class="tech-tag">{{ trim($tech) }}</span>
                                    @endforeach
                                @endif
                            </div>
                        @endif

                        <div class="experience-actions">
                            <a href="{{ route('admin.experiences.edit', $exp) }}" class="btn btn-edit">Edit</a>
                            <form method="POST" action="{{ route('admin.experiences.toggle-status', $exp) }}" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-toggle">
                                    {{ $exp->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.experiences.destroy', $exp) }}" style="display: inline;" 
                                  onsubmit="return confirm('Are you sure you want to delete this experience?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No Experience Records Found</h3>
                <p>Start by adding your professional experience.</p>
                <a href="{{ route('admin.experiences.create') }}" class="add-btn">Add Experience Record</a>
            </div>
        @endif
    </div>
</body>
</html>
