@extends('layouts.app')

@section('content')
@push('styles')
<style>
  /* ========= ABOUT PAGE STYLES ========= */
  .about-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px;
  }

  .about-hero {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 60px;
    align-items: center;
    margin-bottom: 80px;
  }

  .about-photo {
    position: relative;
    display: flex;
    justify-content: center;
  }

  .photo-container {
    position: relative;
    width: 300px;
    height: 350px;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 119, 182, 0.2);
    transition: all 0.4s ease;
  }

  .photo-container:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 30px 60px rgba(0, 119, 182, 0.3);
  }

  .photo-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 119, 182, 0.1), rgba(0, 180, 216, 0.1));
    z-index: 2;
    transition: opacity 0.3s ease;
  }

  .photo-container:hover::before {
    opacity: 0;
  }

  .about-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .photo-container:hover img {
    transform: scale(1.1);
  }

  .about-content {
    position: relative;
  }

  .about-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 15px;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .about-tagline {
    font-size: 1.3rem;
    color: #666;
    margin-bottom: 30px;
    font-weight: 500;
  }

  .about-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
    margin-bottom: 30px;
  }

  .highlight-text {
    color: #0077b6;
    font-weight: 600;
  }

  .about-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 30px;
    margin: 50px 0;
  }

  .stat-item {
    text-align: center;
    padding: 20px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 119, 182, 0.1);
    border: 1px solid rgba(0, 119, 182, 0.1);
    transition: all 0.3s ease;
  }

  .stat-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 119, 182, 0.2);
    border-color: rgba(0, 119, 182, 0.3);
  }

  .stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #0077b6;
    display: block;
    margin-bottom: 5px;
  }

  .stat-label {
    color: #666;
    font-weight: 500;
    font-size: 0.95rem;
  }

  .about-details {
    margin-top: 60px;
  }

  .details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    margin-top: 40px;
  }

  .detail-section {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(0, 119, 182, 0.1);
    border: 1px solid rgba(0, 119, 182, 0.1);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
  }

  .detail-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0, 119, 182, 0.05), transparent);
    transition: left 0.6s ease;
  }

  .detail-section:hover::before {
    left: 100%;
  }

  .detail-section:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 119, 182, 0.2);
    border-color: rgba(0, 119, 182, 0.3);
  }

  .detail-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    position: relative;
    z-index: 2;
  }

  .detail-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    box-shadow: 0 4px 15px rgba(0, 119, 182, 0.3);
    transition: all 0.3s ease;
  }

  .detail-section:hover .detail-icon {
    transform: rotate(360deg) scale(1.1);
  }

  .detail-icon i {
    color: white;
    font-size: 1.3rem;
  }

  .detail-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #0077b6;
    margin: 0;
  }

  .detail-content {
    position: relative;
    z-index: 2;
    color: #555;
    line-height: 1.6;
  }

  .interest-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 15px;
  }

  .interest-tag {
    background: rgba(0, 180, 216, 0.1);
    color: #0077b6;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.85rem;
    font-weight: 500;
    border: 1px solid rgba(0, 180, 216, 0.2);
    transition: all 0.3s ease;
  }

  .interest-tag:hover {
    background: rgba(0, 180, 216, 0.2);
    transform: translateY(-2px);
  }

  .contact-info {
    margin-top: 40px;
    text-align: center;
  }

  .contact-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    color: white;
    padding: 15px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    box-shadow: 0 8px 25px rgba(0, 119, 182, 0.3);
    transition: all 0.3s ease;
  }

  .contact-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(0, 119, 182, 0.4);
    text-decoration: none;
    color: white;
  }

  /* ========= FLOATING ABOUT ICONS ========= */
  .floating-about {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
  }

  .floating-about-icon {
    position: absolute;
    width: 60px;
    height: 60px;
    background: rgba(0, 119, 182, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: floatAbout 16s ease-in-out infinite;
  }

  .floating-about-icon:nth-child(1) {
    top: 15%;
    left: 5%;
    animation-delay: 0s;
  }

  .floating-about-icon:nth-child(2) {
    top: 70%;
    right: 8%;
    animation-delay: 5s;
  }

  .floating-about-icon:nth-child(3) {
    bottom: 20%;
    left: 12%;
    animation-delay: 10s;
  }

  @keyframes floatAbout {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
      opacity: 0.3;
    }
    25% {
      transform: translateY(-35px) rotate(90deg);
      opacity: 0.6;
    }
    50% {
      transform: translateY(-50px) rotate(180deg);
      opacity: 0.3;
    }
    75% {
      transform: translateY(-35px) rotate(270deg);
      opacity: 0.6;
    }
  }

  /* ========= RESPONSIVE DESIGN ========= */
  @media (max-width: 768px) {
    .about-hero {
      grid-template-columns: 1fr;
      gap: 40px;
      text-align: center;
    }

    .about-title {
      font-size: 2.5rem;
    }

    .photo-container {
      width: 250px;
      height: 300px;
    }

    .about-stats {
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
    }

    .details-grid {
      grid-template-columns: 1fr;
      gap: 25px;
    }

    .detail-section {
      padding: 25px;
    }
  }
</style>
@endpush

<div class="about-wrapper">
  <!-- Floating About Icons -->
  <div class="floating-about">
    <div class="floating-about-icon"><i class="fas fa-user"></i></div>
    <div class="floating-about-icon"><i class="fas fa-heart"></i></div>
    <div class="floating-about-icon"><i class="fas fa-star"></i></div>
  </div>

  @if($userInfo)
  <div class="about-hero fade-in-up">
    <div class="about-photo">
      <div class="photo-container">
        @if($userInfo->profile_image)
        <img src="{{ $userInfo->profile_image }}" alt="{{ $userInfo->name }}" loading="lazy">
        @else
        <img src="{{ asset('assest/images/Tanha.jpg') }}" alt="Tanha" loading="lazy">
        @endif
      </div>
    </div>
    
    <div class="about-content">
      <h1 class="about-title">{{ $userInfo->name ?? 'Tanha' }}</h1>
      <p class="about-tagline">{{ $userInfo->title ?? 'Software Developer' }}</p>
      <p class="about-description">
        {{ $userInfo->bio ?? 'Passionate software developer with expertise in web technologies and a love for creating innovative solutions.' }}
      </p>
      
      @if($userInfo->email)
      <div class="contact-info">
        <a href="mailto:{{ $userInfo->email }}" class="contact-button hover-lift">
          <i class="fas fa-envelope"></i>
          Get In Touch
        </a>
      </div>
      @endif
    </div>
  </div>

  <div class="about-stats fade-in-up stagger-1">
    <div class="stat-item">
      <span class="stat-number">{{ $userInfo->years_experience ?? '2' }}+</span>
      <span class="stat-label">Years Experience</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">{{ $projectsCount ?? '10' }}+</span>
      <span class="stat-label">Projects Completed</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">{{ $skillsCount ?? '15' }}+</span>
      <span class="stat-label">Technologies</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">100%</span>
      <span class="stat-label">Client Satisfaction</span>
    </div>
  </div>

  <div class="about-details">
    <div class="details-grid">
      <div class="detail-section fade-in-up stagger-2 hover-lift">
        <div class="detail-header">
          <div class="detail-icon">
            <i class="fas fa-laptop-code"></i>
          </div>
          <h3 class="detail-title">What I Do</h3>
        </div>
        <div class="detail-content">
          <p>{{ $userInfo->what_i_do ?? 'I specialize in full-stack web development, creating responsive and user-friendly applications using modern technologies like Laravel, React, and Vue.js.' }}</p>
        </div>
      </div>

      <div class="detail-section fade-in-up stagger-3 hover-lift">
        <div class="detail-header">
          <div class="detail-icon">
            <i class="fas fa-graduation-cap"></i>
          </div>
          <h3 class="detail-title">Education</h3>
        </div>
        <div class="detail-content">
          <p>{{ $userInfo->education_summary ?? 'Currently pursuing Computer Science with a focus on software engineering and web technologies.' }}</p>
        </div>
      </div>

      @if($userInfo->interests && count($userInfo->interests) > 0)
      <div class="detail-section fade-in-up stagger-4 hover-lift">
        <div class="detail-header">
          <div class="detail-icon">
            <i class="fas fa-heart"></i>
          </div>
          <h3 class="detail-title">Interests</h3>
        </div>
        <div class="detail-content">
          <p>Beyond coding, I'm passionate about various interests that keep me motivated and creative:</p>
          <div class="interest-tags">
            @foreach($userInfo->interests as $interest)
            <span class="interest-tag">{{ $interest }}</span>
            @endforeach
          </div>
        </div>
      </div>
      @endif

      <div class="detail-section fade-in-up stagger-5 hover-lift">
        <div class="detail-header">
          <div class="detail-icon">
            <i class="fas fa-rocket"></i>
          </div>
          <h3 class="detail-title">Goals</h3>
        </div>
        <div class="detail-content">
          <p>{{ $userInfo->career_goals ?? 'My goal is to become a proficient full-stack developer and contribute to innovative projects that make a positive impact on users\' lives.' }}</p>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="about-hero fade-in-up">
    <div class="about-photo">
      <div class="photo-container">
        <img src="{{ asset('assest/images/Tanha.jpg') }}" alt="Tanha" loading="lazy">
      </div>
    </div>
    
    <div class="about-content">
      <h1 class="about-title">Tanha</h1>
      <p class="about-tagline">Software Developer</p>
      <p class="about-description">
        Passionate software developer with expertise in web technologies and a love for creating innovative solutions.
      </p>
      
      <div class="contact-info">
        <a href="mailto:tanha@example.com" class="contact-button hover-lift">
          <i class="fas fa-envelope"></i>
          Get In Touch
        </a>
      </div>
    </div>
  </div>

  <div class="about-stats fade-in-up stagger-1">
    <div class="stat-item">
      <span class="stat-number">2+</span>
      <span class="stat-label">Years Experience</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">10+</span>
      <span class="stat-label">Projects Completed</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">15+</span>
      <span class="stat-label">Technologies</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">100%</span>
      <span class="stat-label">Client Satisfaction</span>
    </div>
  </div>

  <div class="about-details">
    <div class="details-grid">
      <div class="detail-section fade-in-up stagger-2 hover-lift">
        <div class="detail-header">
          <div class="detail-icon">
            <i class="fas fa-laptop-code"></i>
          </div>
          <h3 class="detail-title">What I Do</h3>
        </div>
        <div class="detail-content">
          <p>I specialize in full-stack web development, creating responsive and user-friendly applications using modern technologies like Laravel, React, and Vue.js.</p>
        </div>
      </div>

      <div class="detail-section fade-in-up stagger-3 hover-lift">
        <div class="detail-header">
          <div class="detail-icon">
            <i class="fas fa-graduation-cap"></i>
          </div>
          <h3 class="detail-title">Education</h3>
        </div>
        <div class="detail-content">
          <p>Currently pursuing Computer Science with a focus on software engineering and web technologies.</p>
        </div>
      </div>

      <div class="detail-section fade-in-up stagger-4 hover-lift">
        <div class="detail-header">
          <div class="detail-icon">
            <i class="fas fa-heart"></i>
          </div>
          <h3 class="detail-title">Interests</h3>
        </div>
        <div class="detail-content">
          <p>Beyond coding, I'm passionate about technology, learning new frameworks, and contributing to open-source projects.</p>
        </div>
      </div>

      <div class="detail-section fade-in-up stagger-5 hover-lift">
        <div class="detail-header">
          <div class="detail-icon">
            <i class="fas fa-rocket"></i>
          </div>
          <h3 class="detail-title">Goals</h3>
        </div>
        <div class="detail-content">
          <p>My goal is to become a proficient full-stack developer and contribute to innovative projects that make a positive impact on users' lives.</p>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection
