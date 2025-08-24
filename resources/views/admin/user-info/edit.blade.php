<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Info - Admin Panel</title>
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

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin: 2rem 0 1rem 0;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #0077b6;
        }

        .help-text {
            font-size: 0.85rem;
            color: #666;
            margin-top: 0.25rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div>
            <h1>User Info Management</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> / User Info
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
            <h2>Edit User Information</h2>
            <p>Update your personal information and about section content</p>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('admin.user-info.update') }}">
                @csrf
                @method('PUT')

                <div class="section-title">Personal Information</div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $userInfo->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Professional Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $userInfo->title) }}" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $userInfo->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $userInfo->phone) }}">
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $userInfo->location) }}">
                    </div>
                    <div class="form-group">
                        <label for="website">Website URL</label>
                        <input type="url" id="website" name="website" value="{{ old('website', $userInfo->website) }}">
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="bio">Bio / About Me</label>
                    <textarea id="bio" name="bio" rows="4">{{ old('bio', $userInfo->bio) }}</textarea>
                    <div class="help-text">Brief description about yourself</div>
                </div>

                <div class="section-title">Social Links</div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="github_url">GitHub URL</label>
                        <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $userInfo->github_url) }}">
                    </div>
                    <div class="form-group">
                        <label for="linkedin_url">LinkedIn URL</label>
                        <input type="url" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $userInfo->linkedin_url) }}">
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="twitter_url">Twitter URL</label>
                        <input type="url" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $userInfo->twitter_url) }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram_url">Instagram URL</label>
                        <input type="url" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $userInfo->instagram_url) }}">
                    </div>
                </div>

                <div class="section-title">Portfolio Statistics</div>
                
                <div class="stats-grid">
                    <div class="form-group">
                        <label for="projects_completed">Projects Completed</label>
                        <input type="number" id="projects_completed" name="projects_completed" value="{{ old('projects_completed', $userInfo->projects_completed) }}">
                    </div>
                    <div class="form-group">
                        <label for="years_experience">Years Experience</label>
                        <input type="number" id="years_experience" name="years_experience" value="{{ old('years_experience', $userInfo->years_experience) }}">
                    </div>
                    <div class="form-group">
                        <label for="happy_clients">Happy Clients</label>
                        <input type="number" id="happy_clients" name="happy_clients" value="{{ old('happy_clients', $userInfo->happy_clients) }}">
                    </div>
                    <div class="form-group">
                        <label for="awards_won">Awards Won</label>
                        <input type="number" id="awards_won" name="awards_won" value="{{ old('awards_won', $userInfo->awards_won) }}">
                    </div>
                </div>

                <div class="section-title">Additional Information</div>
                
                <div class="form-group">
                    <label for="interests">Interests</label>
                    <textarea id="interests" name="interests" rows="3">{{ old('interests', is_array($userInfo->interests) ? implode(', ', $userInfo->interests) : $userInfo->interests) }}</textarea>
                    <div class="help-text">Comma-separated list of your interests</div>
                </div>

                <div class="form-group">
                    <label for="availability_status">Availability Status</label>
                    <select id="availability_status" name="availability_status">
                        <option value="available" {{ old('availability_status', $userInfo->availability_status) == 'available' ? 'selected' : '' }}>Available for Work</option>
                        <option value="busy" {{ old('availability_status', $userInfo->availability_status) == 'busy' ? 'selected' : '' }}>Currently Busy</option>
                        <option value="not_available" {{ old('availability_status', $userInfo->availability_status) == 'not_available' ? 'selected' : '' }}>Not Available</option>
                    </select>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update User Info</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
