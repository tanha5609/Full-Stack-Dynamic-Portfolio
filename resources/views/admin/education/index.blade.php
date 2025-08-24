<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Education - Admin Panel</title>
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

        .education-list {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .education-item {
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .education-item:last-child {
            border-bottom: none;
        }

        .education-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .education-title {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
        }

        .education-institution {
            color: #0077b6;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .education-period {
            color: #666;
            font-size: 0.9rem;
        }

        .education-desc {
            color: #666;
            line-height: 1.5;
            margin-top: 0.5rem;
        }

        .education-actions {
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
            <h1>Education Management</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> / Education
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
                <h2>Manage Education</h2>
                <p>Add and manage your educational background</p>
            </div>
            <a href="{{ route('admin.education.create') }}" class="add-btn">+ Add Education</a>
        </div>

        @if($education->count() > 0)
            <div class="education-list">
                @foreach($education as $edu)
                    <div class="education-item">
                        <div class="education-header">
                            <div>
                                <div class="education-institution">{{ $edu->institution }}</div>
                                <div class="education-title">{{ $edu->degree }} @if($edu->field_of_study) in {{ $edu->field_of_study }} @endif</div>
                                <div class="education-period">
                                    {{ $edu->start_date->format('M Y') }} - 
                                    {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}
                                </div>
                                @if($edu->grade)
                                    <div class="education-period">{{ $edu->grade }}</div>
                                @endif
                            </div>
                            <div>
                                <span class="status-badge {{ $edu->is_active ? 'status-active' : 'status-inactive' }}">
                                    {{ $edu->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>

                        @if($edu->description)
                            <div class="education-desc">{{ $edu->description }}</div>
                        @endif

                        <div class="education-actions" style="margin-top: 1rem;">
                            <a href="{{ route('admin.education.edit', $edu) }}" class="btn btn-edit">Edit</a>
                            <form method="POST" action="{{ route('admin.education.toggle-status', $edu) }}" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-toggle">
                                    {{ $edu->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.education.destroy', $edu) }}" style="display: inline;" 
                                  onsubmit="return confirm('Are you sure you want to delete this education record?')">
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
                <h3>No Education Records Found</h3>
                <p>Start by adding your educational background.</p>
                <a href="{{ route('admin.education.create') }}" class="add-btn">Add Education Record</a>
            </div>
        @endif
    </div>
</body>
</html>
