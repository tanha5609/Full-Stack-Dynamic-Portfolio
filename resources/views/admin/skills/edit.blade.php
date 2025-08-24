<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Skill - Admin Panel</title>
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
            max-width: 600px;
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

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #333;
        }

        input, textarea {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #0077b6;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
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
    </style>
</head>
<body>
    <header class="admin-header">
        <div>
            <h1>Edit Skill</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> / 
                <a href="{{ route('admin.skills.index') }}">Skills</a> / Edit
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
            <h2>Edit Skill: {{ $skill->name }}</h2>
            <p>Update skill information</p>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('admin.skills.update', $skill) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Skill Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $skill->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="image_url">Image URL *</label>
                    <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $skill->image_url) }}" required>
                    <div class="help-text">URL to skill icon or logo (e.g., from Wikipedia Commons)</div>
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" required>{{ old('description', $skill->description) }}</textarea>
                    <div class="help-text">Describe your experience and proficiency with this skill</div>
                </div>

                <div class="form-group">
                    <label for="order">Display Order</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $skill->order) }}" min="0">
                    <div class="help-text">Lower numbers appear first</div>
                </div>

                <div class="form-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $skill->is_active) ? 'checked' : '' }}>
                        <label for="is_active">Active</label>
                    </div>
                    <div class="help-text">Only active skills are shown publicly</div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Skill</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
