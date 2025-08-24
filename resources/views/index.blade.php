@extends('layouts.app')

@section('content')
@push('styles')
<style>
  /* ========= INDEX PAGE STYLES ========= */
  .index-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px;
    min-height: 80vh;
    display: flex;
    align-items: center;
  }

  .index-hero {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 80px;
    align-items: center;
    width: 100%;
  }

  .index-content {
    position: relative;
    z-index: 2;
  }

  .index-greeting {
    font-size: 1.3rem;
    color: #666;
    font-weight: 500;
    margin-bottom: 10px;
    opacity: 0;
    animation: slideUp 0.8s ease forwards;
  }

  .index-name {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 15px;
    background: linear-gradient(135deg, #0077b6, #00b4d8, #0096c7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    opacity: 0;
    animation: slideUp 0.8s ease 0.2s forwards;
  }

  .index-title {
    font-size: 2rem;
    color: #0077b6;
    font-weight: 600;
    margin-bottom: 25px;
    opacity: 0;
    animation: slideUp 0.8s ease 0.4s forwards;
  }

  .index-description {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 40px;
    opacity: 0;
    animation: slideUp 0.8s ease 0.6s forwards;
  }

  .tech-highlight {
    color: #0077b6;
    font-weight: 600;
  }

  .index-stats {
    display: flex;
    gap: 30px;
    margin-bottom: 40px;
    opacity: 0;
    animation: slideUp 0.8s ease 0.8s forwards;
  }

  .stat-box {
    text-align: center;
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 119, 182, 0.1);
    border: 1px solid rgba(0, 119, 182, 0.1);
    transition: all 0.3s ease;
  }

  .stat-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 119, 182, 0.2);
  }

  .stat-number {
    font-size: 1.8rem;
    font-weight: 700;
    color: #0077b6;
    display: block;
  }

  .stat-label {
    font-size: 0.9rem;
    color: #666;
    margin-top: 5px;
  }

  .index-actions {
    display: flex;
    gap: 20px;
    opacity: 0;
    animation: slideUp 0.8s ease 1s forwards;
  }

  .action-button {
    padding: 15px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
  }

  .btn-primary {
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    color: white;
    box-shadow: 0 8px 25px rgba(0, 119, 182, 0.3);
  }

  .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(0, 119, 182, 0.4);
    color: white;
    text-decoration: none;
  }

  .btn-secondary {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    color: #0077b6;
    border: 2px solid rgba(0, 119, 182, 0.2);
  }

  .btn-secondary:hover {
    background: rgba(0, 119, 182, 0.1);
    border-color: #0077b6;
    transform: translateY(-3px);
    color: #0077b6;
    text-decoration: none;
  }

  .index-image {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .profile-container {
    position: relative;
    width: 350px;
    height: 350px;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 119, 182, 0.3);
    opacity: 0;
    animation: fadeInScale 1s ease 0.5s forwards;
  }

  .profile-container::before {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    right: -3px;
    bottom: -3px;
    background: linear-gradient(45deg, #0077b6, #00b4d8, #0096c7, #0077b6);
    border-radius: 50%;
    z-index: -1;
    animation: rotateGradient 4s linear infinite;
  }

  .index-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .profile-container:hover img {
    transform: scale(1.05);
  }

  /* ========= FLOATING INDEX ICONS ========= */
  .floating-index {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
  }

  .floating-index-icon {
    position: absolute;
    width: 50px;
    height: 50px;
    background: rgba(0, 119, 182, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: floatIndex 18s ease-in-out infinite;
  }

  .floating-index-icon:nth-child(1) {
    top: 20%;
    left: 8%;
    animation-delay: 0s;
  }

  .floating-index-icon:nth-child(2) {
    top: 70%;
    right: 10%;
    animation-delay: 6s;
  }

  .floating-index-icon:nth-child(3) {
    bottom: 25%;
    left: 5%;
    animation-delay: 12s;
  }

  @keyframes floatIndex {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
      opacity: 0.4;
    }
    33% {
      transform: translateY(-30px) rotate(120deg);
      opacity: 0.7;
    }
    66% {
      transform: translateY(-50px) rotate(240deg);
      opacity: 0.4;
    }
  }

  @keyframes slideUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeInScale {
    from {
      opacity: 0;
      transform: scale(0.8);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  @keyframes rotateGradient {
    from {
      transform: rotate(0deg);
    }
    to {
      transform: rotate(360deg);
    }
  }

  /* ========= RESPONSIVE DESIGN ========= */
  @media (max-width: 768px) {
    .index-hero {
      grid-template-columns: 1fr;
      gap: 40px;
      text-align: center;
    }

    .index-name {
      font-size: 2.8rem;
    }

    .index-title {
      font-size: 1.6rem;
    }

    .profile-container {
      width: 280px;
      height: 280px;
    }

    .index-stats {
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
    }

    .index-actions {
      flex-direction: column;
      align-items: center;
    }

    .action-button {
      width: 100%;
      max-width: 250px;
      justify-content: center;
    }
  }
</style>
@endpush

<div class="index-wrapper">
  <!-- Floating Index Icons -->
  <div class="floating-index">
    <div class="floating-index-icon"><i class="fas fa-code"></i></div>
    <div class="floating-index-icon"><i class="fas fa-desktop"></i></div>
    <div class="floating-index-icon"><i class="fas fa-mobile-alt"></i></div>
  </div>

  <div class="index-hero">
    <div class="index-content">
      <p class="index-greeting">Welcome to my portfolio</p>
      <h1 class="index-name">Foujia Afrose Tanha</h1>
      <h2 class="index-title">Full-Stack Developer</h2>
      <p class="index-description">
        I'm passionate about creating <span class="tech-highlight">dynamic web applications</span> 
        using modern technologies like <span class="tech-highlight">Laravel</span>, 
        <span class="tech-highlight">React</span>, and <span class="tech-highlight">Vue.js</span>. 
        Let's build something amazing together!
      </p>
      
      <div class="index-stats">
        <div class="stat-box hover-lift">
          <span class="stat-number">2+</span>
          <span class="stat-label">Years Experience</span>
        </div>
        <div class="stat-box hover-lift">
          <span class="stat-number">10+</span>
          <span class="stat-label">Projects</span>
        </div>
        <div class="stat-box hover-lift">
          <span class="stat-number">100%</span>
          <span class="stat-label">Dedication</span>
        </div>
      </div>

      <div class="index-actions">
        <a href="{{ url('projects') }}" class="action-button btn-primary hover-lift">
          <i class="fas fa-briefcase"></i>
          View Projects
        </a>
        <a href="{{ url('skills') }}" class="action-button btn-secondary hover-lift">
          <i class="fas fa-cogs"></i>
          My Skills
        </a>
      </div>
    </div>

    <div class="index-image">
      <div class="profile-container">
        <img src="{{ asset('assest/images/Tanha.jpg') }}" alt="Foujia Afrose Tanha" loading="lazy">
      </div>
    </div>
  </div>
</div>
@endsection