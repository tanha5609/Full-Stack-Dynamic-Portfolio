<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tanha | {{ $pageTitle ?? 'Software Developer' }}</title>
  <link rel="stylesheet" href="{{ asset('assest/css/style.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    /* ========= GLOBAL ANIMATIONS & STYLES ========= */
    * {
      box-sizing: border-box;
    }
    
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f5f8fa 0%, #e8f4fd 100%);
      color: #333;
      overflow-x: hidden;
    }

    /* ========= ANIMATED HEADER ========= */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 48px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(0, 119, 182, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
      animation: slideDown 0.8s ease-out;
      box-shadow: 0 2px 20px rgba(0, 119, 182, 0.08);
    }

    @keyframes slideDown {
      from {
        transform: translateY(-100%);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .header-left {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      position: relative;
    }

    .name {
      font-size: 1.8rem;
      font-weight: 700;
      color: #0077b6;
      text-decoration: none;
      position: relative;
      display: inline-block;
      transition: all 0.3s ease;
    }

    .name::before {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: linear-gradient(90deg, #0077b6, #00b4d8);
      transition: width 0.3s ease;
    }

    .name:hover::before {
      width: 100%;
    }

    .name:hover {
      transform: translateY(-2px);
      color: #0096c7;
    }

    .role {
      font-size: 0.9rem;
      color: #666;
      font-weight: 500;
      margin-top: 2px;
      opacity: 0;
      animation: fadeInUp 0.8s ease-out 0.3s forwards;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ========= ANIMATED NAVIGATION ========= */
    .navbar {
      display: flex;
      gap: 30px;
      align-items: center;
    }

    .navbar a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      position: relative;
      padding: 8px 16px;
      border-radius: 25px;
      transition: all 0.3s ease;
      opacity: 0;
      animation: fadeInRight 0.6s ease-out forwards;
    }

    .navbar a:nth-child(1) { animation-delay: 0.1s; }
    .navbar a:nth-child(2) { animation-delay: 0.2s; }
    .navbar a:nth-child(3) { animation-delay: 0.3s; }
    .navbar a:nth-child(4) { animation-delay: 0.4s; }
    .navbar a:nth-child(5) { animation-delay: 0.5s; }

    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .navbar a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #0077b6, #00b4d8);
      border-radius: 25px;
      opacity: 0;
      transform: scale(0.8);
      transition: all 0.3s ease;
      z-index: -1;
    }

    .navbar a:hover::before {
      opacity: 0.1;
      transform: scale(1);
    }

    .navbar a:hover {
      color: #0077b6;
      transform: translateY(-2px);
    }

    .navbar a.active {
      color: #fff;
      background: linear-gradient(135deg, #0077b6, #00b4d8);
      box-shadow: 0 4px 15px rgba(0, 119, 182, 0.3);
    }

    .navbar a.active::before {
      display: none;
    }

    /* ========= FLOATING ELEMENTS ========= */
    .floating-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
      overflow: hidden;
    }

    .floating-circle {
      position: absolute;
      border-radius: 50%;
      background: linear-gradient(135deg, rgba(0, 119, 182, 0.05), rgba(0, 180, 216, 0.08));
      animation: float 6s ease-in-out infinite;
    }

    .floating-circle:nth-child(1) {
      width: 80px;
      height: 80px;
      top: 10%;
      left: 10%;
      animation-delay: 0s;
    }

    .floating-circle:nth-child(2) {
      width: 120px;
      height: 120px;
      top: 60%;
      right: 10%;
      animation-delay: 2s;
    }

    .floating-circle:nth-child(3) {
      width: 60px;
      height: 60px;
      bottom: 20%;
      left: 20%;
      animation-delay: 4s;
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0) rotate(0deg);
      }
      50% {
        transform: translateY(-20px) rotate(180deg);
      }
    }

    /* ========= CONTENT ANIMATIONS ========= */
    .fade-in {
      opacity: 0;
      animation: fadeIn 1s ease-out forwards;
    }

    .fade-in-up {
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 0.8s ease-out forwards;
    }

    .slide-in-left {
      opacity: 0;
      transform: translateX(-50px);
      animation: slideInLeft 0.8s ease-out forwards;
    }

    .slide-in-right {
      opacity: 0;
      transform: translateX(50px);
      animation: slideInRight 0.8s ease-out forwards;
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }

    @keyframes slideInLeft {
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes slideInRight {
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    /* ========= STAGGERED ANIMATIONS ========= */
    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }
    .stagger-5 { animation-delay: 0.5s; }
    .stagger-6 { animation-delay: 0.6s; }

    /* ========= HOVER EFFECTS ========= */
    .hover-lift {
      transition: all 0.3s ease;
    }

    .hover-lift:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 119, 182, 0.15);
    }

    .hover-glow {
      transition: all 0.3s ease;
    }

    .hover-glow:hover {
      box-shadow: 0 0 20px rgba(0, 119, 182, 0.3);
    }

    /* ========= RESPONSIVE DESIGN ========= */
    @media (max-width: 768px) {
      .header {
        padding: 15px 20px;
        flex-direction: column;
        gap: 15px;
      }

      .navbar {
        gap: 15px;
        flex-wrap: wrap;
        justify-content: center;
      }

      .navbar a {
        padding: 6px 12px;
        font-size: 0.9rem;
      }

      .name {
        font-size: 1.5rem;
      }
    }

    /* ========= LOADING ANIMATION ========= */
    .page-loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #0077b6, #00b4d8);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      animation: fadeOut 0.5s ease-out 1.5s forwards;
    }

    .loader-circle {
      width: 50px;
      height: 50px;
      border: 3px solid rgba(255, 255, 255, 0.3);
      border-top: 3px solid white;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    @keyframes fadeOut {
      to {
        opacity: 0;
        visibility: hidden;
      }
    }
  </style>
  @stack('styles')
</head>
<body>
  <!-- Loading Animation -->
  <div class="page-loader">
    <div class="loader-circle"></div>
  </div>

  <!-- Floating Background Elements -->
  <div class="floating-bg">
    <div class="floating-circle"></div>
    <div class="floating-circle"></div>
    <div class="floating-circle"></div>
  </div>

  <!-- Header -->
  <header class="header">
    <div class="header-left">
        <a href="{{ url('/') }}" class="name">Tanha</a>
        <div class="role">Software Developer</div>
    </div>
    <nav class="navbar">
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About me</a>
        <a href="{{ route('education') }}" class="{{ request()->routeIs('education') ? 'active' : '' }}">Education</a>
        <a href="{{ route('skills') }}" class="{{ request()->routeIs('skills') ? 'active' : '' }}">Skills</a>
        <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
        <a href="{{ route('experience') }}" class="{{ request()->routeIs('experience') ? 'active' : '' }}">Experience</a>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="main-content">
    @yield('content')
  </main>

  <!-- Scripts -->
  <script>
    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // Intersection Observer for animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.animationPlayState = 'running';
        }
      });
    }, observerOptions);

    // Observe all animated elements
    document.addEventListener('DOMContentLoaded', () => {
      const animatedElements = document.querySelectorAll('.fade-in, .fade-in-up, .slide-in-left, .slide-in-right');
      animatedElements.forEach(el => {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
      });
    });

    // Parallax effect
    window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const parallax = document.querySelectorAll('.floating-circle');
      const speed = 0.5;

      parallax.forEach(element => {
        const yPos = -(scrolled * speed);
        element.style.transform = `translateY(${yPos}px)`;
      });
    });
  </script>
  @stack('scripts')
</body>
</html>
