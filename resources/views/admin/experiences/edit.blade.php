<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Experience - Admin Panel</title>
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
            max-width: 700px;
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

        .btn-danger {
            background: #dc3545;
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
            <h1>Edit Experience</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> / 
                <a href="{{ route('admin.experiences.index') }}">Experience</a> / Edit
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
            <h2>Edit Experience</h2>
            <p>Update work experience information</p>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('admin.experiences.update', $experience->id) }}">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label for="company">Company *</label>
                        <input type="text" id="company" name="company" value="{{ old('company', $experience->company) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position *</label>
                        <input type="text" id="position" name="position" value="{{ old('position', $experience->position) }}" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="employment_type">Employment Type</label>
                        <select id="employment_type" name="employment_type">
                            <option value="">Select Type</option>
                            <option value="Full-time" {{ old('employment_type', $experience->employment_type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ old('employment_type', $experience->employment_type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ old('employment_type', $experience->employment_type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Freelance" {{ old('employment_type', $experience->employment_type) == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                            <option value="Internship" {{ old('employment_type', $experience->employment_type) == 'Internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $experience->location) }}">
                        <div class="help-text">e.g., Remote, New York, NY</div>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="start_date">Start Date *</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $experience->start_date ? $experience->start_date->format('Y-m-d') : '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}">
                        <div class="help-text">Leave empty if currently working</div>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="description">Job Description</label>
                    <textarea id="description" name="description" rows="4">{{ old('description', $experience->description) }}</textarea>
                    <div class="help-text">Describe your responsibilities, achievements, and key contributions</div>
                </div>

                <div class="form-group full-width">
                    <label for="technologies">Technologies Used</label>
                    <input type="text" id="technologies" name="technologies" value="{{ old('technologies', is_array($experience->technologies) ? implode(', ', $experience->technologies) : $experience->technologies) }}">
                    <div class="help-text">Comma-separated list of technologies (e.g., Laravel, Vue.js, MySQL)</div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="order">Display Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $experience->order) }}" min="0">
                        <div class="help-text">Lower numbers appear first</div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $experience->is_active) ? 'checked' : '' }}>
                            <label for="is_active">Active</label>
                        </div>
                        <div class="help-text">Only active experiences are shown publicly</div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Cancel</a>
                    <form method="POST" action="{{ route('admin.experiences.destroy', $experience->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this experience?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="submit" class="btn btn-primary">Update Experience</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
