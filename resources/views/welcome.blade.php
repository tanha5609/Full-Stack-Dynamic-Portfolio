@extends('layouts.app')

@section('content')
@push('styles')
<style>
  /* ========= WELCOME PAGE STYLES ========= */
  .welcome-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px;
    min-height: 80vh;
    display: flex;
    align-items: center;
  }

  .welcome-hero {
    display: grid;
    grid-template-columns: 1.3fr 1fr;
    gap: 80px;
    align-items: center;
    width: 100%;
  }

  .welcome-content {
    position: relative;
    z-index: 2;
  }

  .welcome-greeting {
    font-size: 1.4rem;
    color: #666;
    font-weight: 500;
    margin-bottom: 10px;
    opacity: 0;
    animation: slideInLeft 0.8s ease forwards;
  }

  .welcome-name {
    font-size: 4rem;
    font-weight: 700;
    margin-bottom: 15px;
    background: linear-gradient(135deg, #0077b6, #00b4d8, #0096c7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    opacity: 0;
    animation: slideInLeft 0.8s ease 0.2s forwards;
  }

  .welcome-title {
    font-size: 2.2rem;
    color: #0077b6;
    font-weight: 600;
    margin-bottom: 25px;
    opacity: 0;
    animation: slideInLeft 0.8s ease 0.4s forwards;
  }

  .welcome-description {
    font-size: 1.2rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 40px;
    opacity: 0;
    animation: slideInLeft 0.8s ease 0.6s forwards;
  }

  .highlight-text {
    color: #0077b6;
    font-weight: 600;
  }

  .social-links {
    display: flex;
    gap: 20px;
    margin-bottom: 40px;
    opacity: 0;
    animation: slideInLeft 0.8s ease 0.8s forwards;
  }

  .social-link {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #0077b6;
    font-size: 1.3rem;
    box-shadow: 0 8px 25px rgba(0, 119, 182, 0.2);
    border: 1px solid rgba(0, 119, 182, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .social-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    transition: left 0.3s ease;
    z-index: -1;
  }

  .social-link:hover::before {
    left: 0;
  }

  .social-link:hover {
    color: white;
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 15px 35px rgba(0, 119, 182, 0.4);
  }

  .welcome-cta {
    display: flex;
    gap: 20px;
    opacity: 0;
    animation: slideInLeft 0.8s ease 1s forwards;
  }

  .cta-button {
    padding: 15px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
  }

  .cta-primary {
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    color: white;
    box-shadow: 0 8px 25px rgba(0, 119, 182, 0.3);
  }

  .cta-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(0, 119, 182, 0.4);
    color: white;
    text-decoration: none;
  }

  .cta-secondary {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    color: #0077b6;
    border: 2px solid rgba(0, 119, 182, 0.2);
  }

  .cta-secondary:hover {
    background: rgba(0, 119, 182, 0.1);
    border-color: #0077b6;
    transform: translateY(-3px);
    color: #0077b6;
    text-decoration: none;
  }

  .welcome-image {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .image-container {
    position: relative;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 119, 182, 0.3);
    opacity: 0;
    animation: scaleIn 1s ease 0.5s forwards;
  }

  .image-container::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: linear-gradient(45deg, #0077b6, #00b4d8, #0096c7, #0077b6);
    border-radius: 50%;
    z-index: -1;
    animation: rotate 4s linear infinite;
  }

  .welcome-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .image-container:hover img {
    transform: scale(1.05);
  }

  /* ========= FLOATING WELCOME ICONS ========= */
  .floating-welcome {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
  }

  .floating-welcome-icon {
    position: absolute;
    width: 60px;
    height: 60px;
    background: rgba(0, 119, 182, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: floatWelcome 20s ease-in-out infinite;
  }

  .floating-welcome-icon:nth-child(1) {
    top: 10%;
    left: 10%;
    animation-delay: 0s;
  }

  .floating-welcome-icon:nth-child(2) {
    top: 60%;
    right: 5%;
    animation-delay: 7s;
  }

  .floating-welcome-icon:nth-child(3) {
    bottom: 15%;
    left: 15%;
    animation-delay: 14s;
  }

  .floating-welcome-icon:nth-child(4) {
    top: 30%;
    right: 20%;
    animation-delay: 3s;
  }

  @keyframes floatWelcome {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
      opacity: 0.3;
    }
    25% {
      transform: translateY(-40px) rotate(90deg);
      opacity: 0.7;
    }
    50% {
      transform: translateY(-60px) rotate(180deg);
      opacity: 0.3;
    }
    75% {
      transform: translateY(-40px) rotate(270deg);
      opacity: 0.7;
    }
  }

  @keyframes slideInLeft {
    from {
      opacity: 0;
      transform: translateX(-50px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  @keyframes scaleIn {
    from {
      opacity: 0;
      transform: scale(0.8);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  @keyframes rotate {
    from {
      transform: rotate(0deg);
    }
    to {
      transform: rotate(360deg);
    }
  }

  /* ========= RESPONSIVE DESIGN ========= */
  @media (max-width: 768px) {
    .welcome-hero {
      grid-template-columns: 1fr;
      gap: 40px;
      text-align: center;
    }

    .welcome-name {
      font-size: 3rem;
    }

    .welcome-title {
      font-size: 1.8rem;
    }

    .image-container {
      width: 300px;
      height: 300px;
    }

    .welcome-cta {
      flex-direction: column;
      align-items: center;
    }

    .cta-button {
      width: 100%;
      max-width: 250px;
      justify-content: center;
    }

    .social-links {
      justify-content: center;
    }
  }
</style>
@endpush

<div class="welcome-wrapper">
  <!-- Floating Welcome Icons -->
  <div class="floating-welcome">
    <div class="floating-welcome-icon"><i class="fas fa-code"></i></div>
    <div class="floating-welcome-icon"><i class="fas fa-laptop"></i></div>
    <div class="floating-welcome-icon"><i class="fas fa-rocket"></i></div>
    <div class="floating-welcome-icon"><i class="fas fa-lightbulb"></i></div>
  </div>

  <div class="welcome-hero">
    <div class="welcome-content">
      <p class="welcome-greeting">Hi, I am</p>
      <h1 class="welcome-name">Foujia Afrose Tanha</h1>
      <h2 class="welcome-title">Software Developer</h2>
      <p class="welcome-description">
        Passionate about building <span class="highlight-text">impactful software solutions</span>. 
        Always eager to learn and grow in the tech world, creating innovative 
        applications that make a difference.
      </p>
      
      <div class="social-links">
        <a href="https://facebook.com/" target="_blank" class="social-link" aria-label="Facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://linkedin.com/" target="_blank" class="social-link" aria-label="LinkedIn">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://github.com/" target="_blank" class="social-link" aria-label="GitHub">
          <i class="fab fa-github"></i>
        </a>
        <a href="https://twitter.com/" target="_blank" class="social-link" aria-label="Twitter">
          <i class="fab fa-twitter"></i>
        </a>
      </div>

      <div class="welcome-cta">
        <a href="{{ url('projects') }}" class="cta-button cta-primary hover-lift">
          <i class="fas fa-briefcase"></i>
          View My Work
        </a>
        <a href="{{ url('about') }}" class="cta-button cta-secondary hover-lift">
          <i class="fas fa-user"></i>
          About Me
        </a>
      </div>
    </div>

    <div class="welcome-image">
      <div class="image-container">
        <img src="{{ asset('assest/images/Tanha.jpg') }}" alt="Foujia Afrose Tanha" loading="lazy">
      </div>
    </div>
  </div>
</div>
@endsection