<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserInfoController;

// Frontend Portfolio Routes
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/education', [PortfolioController::class, 'education'])->name('education');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');
Route::get('/experience', [PortfolioController::class, 'experience'])->name('experience');

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register']);
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Admin Protected Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Skills Management
        Route::prefix('skills')->group(function () {
            Route::get('/', [SkillController::class, 'adminIndex'])->name('admin.skills.index');
            Route::get('/create', [SkillController::class, 'create'])->name('admin.skills.create');
            Route::post('/', [SkillController::class, 'store'])->name('admin.skills.store');
            Route::get('/{skill}', [SkillController::class, 'show'])->name('admin.skills.show');
            Route::get('/{skill}/edit', [SkillController::class, 'edit'])->name('admin.skills.edit');
            Route::put('/{skill}', [SkillController::class, 'update'])->name('admin.skills.update');
            Route::delete('/{skill}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');
            Route::patch('/{skill}/toggle-status', [SkillController::class, 'toggleStatus'])->name('admin.skills.toggle-status');
        });

        // Education Management
        Route::prefix('education')->group(function () {
            Route::get('/', [EducationController::class, 'adminIndex'])->name('admin.education.index');
            Route::get('/create', [EducationController::class, 'create'])->name('admin.education.create');
            Route::post('/', [EducationController::class, 'store'])->name('admin.education.store');
            Route::get('/{education}', [EducationController::class, 'show'])->name('admin.education.show');
            Route::get('/{education}/edit', [EducationController::class, 'edit'])->name('admin.education.edit');
            Route::put('/{education}', [EducationController::class, 'update'])->name('admin.education.update');
            Route::delete('/{education}', [EducationController::class, 'destroy'])->name('admin.education.destroy');
            Route::patch('/{education}/toggle-status', [EducationController::class, 'toggleStatus'])->name('admin.education.toggle-status');
        });

        // Experience Management
        Route::prefix('experiences')->group(function () {
            Route::get('/', [ExperienceController::class, 'adminIndex'])->name('admin.experiences.index');
            Route::get('/create', [ExperienceController::class, 'create'])->name('admin.experiences.create');
            Route::post('/', [ExperienceController::class, 'store'])->name('admin.experiences.store');
            Route::get('/{experience}', [ExperienceController::class, 'show'])->name('admin.experiences.show');
            Route::get('/{experience}/edit', [ExperienceController::class, 'edit'])->name('admin.experiences.edit');
            Route::put('/{experience}', [ExperienceController::class, 'update'])->name('admin.experiences.update');
            Route::delete('/{experience}', [ExperienceController::class, 'destroy'])->name('admin.experiences.destroy');
            Route::patch('/{experience}/toggle-status', [ExperienceController::class, 'toggleStatus'])->name('admin.experiences.toggle-status');
        });

        // Projects Management
        Route::prefix('projects')->group(function () {
            Route::get('/', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
            Route::get('/create', [ProjectController::class, 'create'])->name('admin.projects.create');
            Route::post('/', [ProjectController::class, 'store'])->name('admin.projects.store');
            Route::get('/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');
            Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
            Route::put('/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
            Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
            Route::patch('/{project}/toggle-status', [ProjectController::class, 'toggleStatus'])->name('admin.projects.toggle-status');
            Route::patch('/{project}/toggle-featured', [ProjectController::class, 'toggleFeatured'])->name('admin.projects.toggle-featured');
        });

        // User Info Management
        Route::prefix('user-info')->group(function () {
            Route::get('/edit', [UserInfoController::class, 'edit'])->name('admin.user-info.edit');
            Route::put('/', [UserInfoController::class, 'update'])->name('admin.user-info.update');
        });
    });
});
