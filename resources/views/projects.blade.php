@extends('layouts.app')

@section('content')
@push('styles')
<style>
  /* ========= PROJECTS PAGE STYLES ========= */
  .projects-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px;
  }

  .projects-title {
    text-align: center;
    font-size: 3rem;
    font-weight: 700;
    color: #0077b6;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
  }

  .projects-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    border-radius: 2px;
  }

  .projects-subtitle {
    text-align: center;
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 60px;
  }

  .projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    margin-top: 40px;
  }

  .project-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 119, 182, 0.15);
    border: 1px solid rgba(0, 119, 182, 0.1);
    transition: all 0.4s ease;
    position: relative;
  }

  .project-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 119, 182, 0.25);
    border-color: rgba(0, 119, 182, 0.3);
  }

  .project-image {
    position: relative;
    height: 220px;
    overflow: hidden;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .project-card:hover .project-image img {
    transform: scale(1.1);
  }

  .project-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 119, 182, 0.8), rgba(0, 180, 216, 0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .project-card:hover .project-image::before {
    opacity: 0.3;
  }

  .project-placeholder {
    color: white;
    font-size: 4rem;
    opacity: 0.7;
  }

  .project-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 119, 182, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .project-card:hover .project-overlay {
    opacity: 1;
  }

  .overlay-content {
    text-align: center;
    color: white;
  }

  .project-links {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 15px;
  }

  .project-link {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.3);
  }

  .project-link:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
    color: white;
  }

  .project-content {
    padding: 30px;
  }

  .project-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #0077b6;
    margin-bottom: 10px;
  }

  .project-description {
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 0.95rem;
  }

  .project-tech {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
  }

  .tech-tag {
    background: rgba(0, 180, 216, 0.1);
    color: #0077b6;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
    border: 1px solid rgba(0, 180, 216, 0.2);
    transition: all 0.3s ease;
  }

  .tech-tag:hover {
    background: rgba(0, 180, 216, 0.2);
    transform: translateY(-2px);
  }

  .project-status {
    display: inline-block;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .status-completed {
    background: rgba(40, 167, 69, 0.1);
    color: #28a745;
    border: 1px solid rgba(40, 167, 69, 0.2);
  }

  .status-ongoing {
    background: rgba(255, 193, 7, 0.1);
    color: #ffc107;
    border: 1px solid rgba(255, 193, 7, 0.2);
  }

  /* ========= FLOATING PROJECT ICONS ========= */
  .floating-projects {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
  }

  .floating-project-icon {
    position: absolute;
    width: 60px;
    height: 60px;
    background: rgba(0, 119, 182, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: floatProjects 20s ease-in-out infinite;
  }

  .floating-project-icon:nth-child(1) {
    top: 10%;
    left: 5%;
    animation-delay: 0s;
  }

  .floating-project-icon:nth-child(2) {
    top: 60%;
    right: 8%;
    animation-delay: 7s;
  }

  .floating-project-icon:nth-child(3) {
    bottom: 15%;
    left: 10%;
    animation-delay: 14s;
  }

  @keyframes floatProjects {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
      opacity: 0.3;
    }
    25% {
      transform: translateY(-40px) rotate(90deg);
      opacity: 0.6;
    }
    50% {
      transform: translateY(-60px) rotate(180deg);
      opacity: 0.3;
    }
    75% {
      transform: translateY(-40px) rotate(270deg);
      opacity: 0.6;
    }
  }

  /* ========= RESPONSIVE DESIGN ========= */
  @media (max-width: 768px) {
    .projects-grid {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .projects-title {
      font-size: 2.5rem;
    }

    .project-content {
      padding: 25px;
    }

    .project-image {
      height: 200px;
    }
  }
</style>
@endpush

<div class="projects-wrapper">
  <!-- Floating Project Icons -->
  <div class="floating-projects">
    <div class="floating-project-icon"><i class="fas fa-laptop-code"></i></div>
    <div class="floating-project-icon"><i class="fas fa-mobile-alt"></i></div>
    <div class="floating-project-icon"><i class="fas fa-globe"></i></div>
  </div>

  <div class="fade-in-up">
    <h1 class="projects-title">Projects</h1>
    <p class="projects-subtitle">Showcase of my recent work and achievements</p>
  </div>

  <div class="projects-grid">
    @forelse($projects as $project)
    <div class="project-card fade-in-up stagger-{{ $loop->index + 1 }} hover-lift">
      <div class="project-image">
        @if($project->image)
        <img src="{{ $project->image }}" alt="{{ $project->title }}" loading="lazy">
        @else
        <i class="fas fa-laptop-code project-placeholder"></i>
        @endif
        <div class="project-overlay">
          <div class="overlay-content">
            <p style="margin: 0; font-weight: 600;">View Project</p>
            <div class="project-links">
              @if($project->demo_url)
              <a href="{{ $project->demo_url }}" target="_blank" class="project-link" title="Live Demo">
                <i class="fas fa-external-link-alt"></i>
              </a>
              @endif
              @if($project->github_url)
              <a href="{{ $project->github_url }}" target="_blank" class="project-link" title="GitHub">
                <i class="fab fa-github"></i>
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>
      
      <div class="project-content">
        <h3 class="project-title">{{ $project->title ?? 'Project Title' }}</h3>
        <p class="project-description">
          {{ $project->description ?? 'Project description goes here. This is a brief overview of what the project does and its key features.' }}
        </p>
        
        @if($project->technologies && count($project->technologies) > 0)
        <div class="project-tech">
          @foreach($project->technologies as $tech)
          <span class="tech-tag">{{ $tech }}</span>
          @endforeach
        </div>
        @endif
        
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <span class="project-status {{ $project->status === 'completed' ? 'status-completed' : 'status-ongoing' }}">
            {{ $project->status ?? 'Completed' }}
          </span>
        </div>
      </div>
    </div>
    @empty
    <!-- Default projects if no data -->
    <div class="project-card fade-in-up stagger-1 hover-lift">
      <div class="project-image">
        <i class="fas fa-laptop-code project-placeholder"></i>
        <div class="project-overlay">
          <div class="overlay-content">
            <p style="margin: 0; font-weight: 600;">View Project</p>
            <div class="project-links">
              <a href="#" class="project-link" title="Live Demo">
                <i class="fas fa-external-link-alt"></i>
              </a>
              <a href="#" class="project-link" title="GitHub">
                <i class="fab fa-github"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="project-content">
        <h3 class="project-title">E-Commerce Platform</h3>
        <p class="project-description">
          A full-featured e-commerce platform built with Laravel and Vue.js. 
          Features include user authentication, product management, shopping cart, and payment integration.
        </p>
        
        <div class="project-tech">
          <span class="tech-tag">Laravel</span>
          <span class="tech-tag">Vue.js</span>
          <span class="tech-tag">MySQL</span>
          <span class="tech-tag">Bootstrap</span>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <span class="project-status status-completed">Completed</span>
        </div>
      </div>
    </div>

    <div class="project-card fade-in-up stagger-2 hover-lift">
      <div class="project-image">
        <i class="fas fa-mobile-alt project-placeholder"></i>
        <div class="project-overlay">
          <div class="overlay-content">
            <p style="margin: 0; font-weight: 600;">View Project</p>
            <div class="project-links">
              <a href="#" class="project-link" title="Live Demo">
                <i class="fas fa-external-link-alt"></i>
              </a>
              <a href="#" class="project-link" title="GitHub">
                <i class="fab fa-github"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="project-content">
        <h3 class="project-title">Task Management App</h3>
        <p class="project-description">
          A responsive task management application with real-time updates, 
          drag-and-drop functionality, and team collaboration features.
        </p>
        
        <div class="project-tech">
          <span class="tech-tag">React</span>
          <span class="tech-tag">Node.js</span>
          <span class="tech-tag">MongoDB</span>
          <span class="tech-tag">Socket.io</span>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <span class="project-status status-ongoing">Ongoing</span>
        </div>
      </div>
    </div>

    <div class="project-card fade-in-up stagger-3 hover-lift">
      <div class="project-image">
        <i class="fas fa-globe project-placeholder"></i>
        <div class="project-overlay">
          <div class="overlay-content">
            <p style="margin: 0; font-weight: 600;">View Project</p>
            <div class="project-links">
              <a href="#" class="project-link" title="Live Demo">
                <i class="fas fa-external-link-alt"></i>
              </a>
              <a href="#" class="project-link" title="GitHub">
                <i class="fab fa-github"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="project-content">
        <h3 class="project-title">Portfolio Website</h3>
        <p class="project-description">
          A dynamic portfolio website with admin panel for content management. 
          Built with Laravel and featuring modern animations and responsive design.
        </p>
        
        <div class="project-tech">
          <span class="tech-tag">Laravel</span>
          <span class="tech-tag">PHP</span>
          <span class="tech-tag">JavaScript</span>
          <span class="tech-tag">CSS3</span>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <span class="project-status status-completed">Completed</span>
        </div>
      </div>
    </div>
    @endforelse
  </div>
</div>
@endsection
