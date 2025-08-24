<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio</title>
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

        .dashboard-header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-header h1 {
            color: #0077b6;
            font-size: 1.5rem;
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

        .logout-btn:hover {
            background: #c82333;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            text-align: center;
            border-left: 4px solid #0077b6;
        }

        .stat-card h3 {
            color: #0077b6;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            color: #666;
            font-size: 1rem;
        }

        .management-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .management-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            text-align: center;
        }

        .management-card h3 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .management-card p {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .manage-btn {
            background: #0077b6;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 0.95rem;
            transition: background 0.3s;
        }

        .manage-btn:hover {
            background: #005f94;
        }

        .welcome-section {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .welcome-section h2 {
            color: #0077b6;
            margin-bottom: 1rem;
        }

        .welcome-section p {
            color: #666;
            line-height: 1.6;
        }

        .quick-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .quick-action {
            background: #e0f4ff;
            color: #0077b6;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            border: 1px solid #b3d9ff;
        }

        .quick-action:hover {
            background: #b3d9ff;
        }
    </style>
</head>
<body>
    <header class="dashboard-header">
        <h1>Portfolio Admin Dashboard</h1>
        <div class="user-info">
            <span>Welcome, {{ Auth::guard('admin')->user()->name }}!</span>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </header>

    <div class="dashboard-container">
        <div class="welcome-section">
            <h2>Dashboard Overview</h2>
            <p>Welcome to your portfolio admin panel. Here you can manage all aspects of your portfolio content including skills, education, experience, projects, and personal information.</p>
            <div class="quick-actions">
                <a href="{{ url('/') }}" class="quick-action" target="_blank">View Portfolio</a>
                <a href="{{ route('admin.skills.create') }}" class="quick-action">Add New Skill</a>
                <a href="{{ route('admin.projects.create') }}" class="quick-action">Add New Project</a>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>{{ $skills_count }}</h3>
                <p>Total Skills</p>
            </div>
            <div class="stat-card">
                <h3>{{ $education_count }}</h3>
                <p>Education Records</p>
            </div>
            <div class="stat-card">
                <h3>{{ $experience_count }}</h3>
                <p>Work Experiences</p>
            </div>
            <div class="stat-card">
                <h3>{{ $projects_count }}</h3>
                <p>Projects</p>
            </div>
        </div>

        <div class="management-grid">
            <div class="management-card">
                <h3>Skills Management</h3>
                <p>Add, edit, and organize your technical skills. Upload skill icons and write descriptions.</p>
                <a href="{{ route('admin.skills.index') }}" class="manage-btn">Manage Skills</a>
            </div>

            <div class="management-card">
                <h3>Education Management</h3>
                <p>Manage your educational background, degrees, institutions, and academic achievements.</p>
                <a href="{{ route('admin.education.index') }}" class="manage-btn">Manage Education</a>
            </div>

            <div class="management-card">
                <h3>Experience Management</h3>
                <p>Update your work experience, job positions, companies, and professional achievements.</p>
                <a href="{{ route('admin.experiences.index') }}" class="manage-btn">Manage Experience</a>
            </div>

            <div class="management-card">
                <h3>Projects Management</h3>
                <p>Showcase your projects with descriptions, images, technologies used, and project links.</p>
                <a href="{{ route('admin.projects.index') }}" class="manage-btn">Manage Projects</a>
            </div>

            <div class="management-card">
                <h3>Personal Information</h3>
                <p>Update your personal details, contact information, bio, and social media links.</p>
                <a href="{{ route('admin.user-info.edit') }}" class="manage-btn">Edit Profile</a>
            </div>
        </div>
    </div>
</body>
</html>
