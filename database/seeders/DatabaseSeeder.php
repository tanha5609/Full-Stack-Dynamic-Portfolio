<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\UserInfo;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('password'),
        ]);

        // Create user info
        UserInfo::create([
            'name' => 'Foujia Afrose Tanha',
            'title' => 'Software Developer',
            'bio' => 'I build clean, scalable software that solves real-world problems and delights users. Over the past two years I\'ve explored full-stack web, cross-platform mobile, and a dash of cloud automation. Whether it\'s crafting pixel-perfect UIs in Flutter or optimizing back-end queries in MySQL, I love turning complex ideas into elegant, maintainable code.',
            'email' => 'tanha@example.com',
            'phone' => '+880 123-456-789',
            'location' => 'Dhaka, Bangladesh',
            'website' => 'https://tanha-portfolio.com',
            'linkedin_url' => 'https://linkedin.com/in/tanha',
            'github_url' => 'https://github.com/tanha',
            'years_experience' => 2,
            'projects_completed' => 15,
            'happy_clients' => 8,
            'awards_won' => 3,
            'interests' => ['Tech Blogging', 'UI/UX Design', 'Reading Sci-Fi', 'Travel Photography', 'Public Speaking', 'Open-Source'],
            'availability_status' => 'available',
        ]);

        // Create skills
        $skills = [
            [
                'name' => 'HTML',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/6/61/HTML5_logo_and_wordmark.svg',
                'description' => 'I have solid experience with HTML5, building semantic and accessible structures. I\'ve been using it confidently for over 6 months.',
                'order' => 1,
            ],
            [
                'name' => 'CSS',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/d/d5/CSS3_logo_and_wordmark.svg',
                'description' => 'From layouts to animations, I\'ve worked with modern CSS including Flexbox and Grid. I can build beautiful responsive UIs.',
                'order' => 2,
            ],
            [
                'name' => 'JavaScript',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png',
                'description' => 'I\'ve built interactive components using JavaScript. With 6+ months of practice, I\'m confident in writing clean, dynamic code.',
                'order' => 3,
            ],
            [
                'name' => 'PHP',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg',
                'description' => 'I use PHP for backend development with Laravel framework. Experienced in building REST APIs and web applications.',
                'order' => 4,
            ],
            [
                'name' => 'Laravel',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg',
                'description' => 'Laravel is my go-to PHP framework for building robust web applications with elegant syntax and powerful features.',
                'order' => 5,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Create education records
        $education = [
            [
                'institution' => 'University of Example',
                'degree' => 'Bachelor of Science',
                'field_of_study' => 'Computer Science',
                'start_date' => '2020-01-01',
                'end_date' => '2024-12-01',
                'description' => 'Focused on software engineering, algorithms, and web development.',
                'grade' => 'CGPA: 3.8/4.0',
                'order' => 1,
            ],
        ];

        foreach ($education as $edu) {
            Education::create($edu);
        }

        // Create experience records
        $experiences = [
            [
                'company' => 'Tech Solutions Inc.',
                'position' => 'Junior Web Developer',
                'start_date' => '2023-06-01',
                'end_date' => null,
                'description' => 'Developing and maintaining web applications using Laravel, JavaScript, and MySQL. Collaborating with cross-functional teams to deliver high-quality software solutions.',
                'location' => 'Remote',
                'technologies' => ['Laravel', 'PHP', 'JavaScript', 'MySQL', 'HTML', 'CSS'],
                'order' => 1,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }

        // Create project records
        $projects = [
            [
                'title' => 'Dynamic Portfolio Website',
                'description' => 'A responsive portfolio website built with Laravel and modern web technologies. Features an admin panel for content management.',
                'image_url' => 'https://via.placeholder.com/300x200/0077b6/ffffff?text=Portfolio',
                'technologies' => ['Laravel', 'PHP', 'JavaScript', 'HTML', 'CSS', 'MySQL'],
                'github_url' => 'https://github.com/tanha/portfolio',
                'live_url' => 'https://tanha-portfolio.com',
                'completion_date' => '2024-08-01',
                'order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'E-commerce Platform',
                'description' => 'A full-featured e-commerce platform with user authentication, product management, and payment integration.',
                'image_url' => 'https://via.placeholder.com/300x200/28a745/ffffff?text=E-commerce',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Stripe API'],
                'github_url' => 'https://github.com/tanha/ecommerce',
                'live_url' => null,
                'completion_date' => '2024-06-01',
                'order' => 2,
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
