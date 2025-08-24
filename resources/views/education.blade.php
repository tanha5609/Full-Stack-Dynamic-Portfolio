@extends('layouts.app')

@section('content')
@push('styles')
<style>
  /* ========= EDUCATION PAGE STYLES ========= */
  .education-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px;
  }

  .education-title {
    text-align: center;
    font-size: 3rem;
    font-weight: 700;
    color: #0077b6;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
  }

  .education-title::after {
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

  .education-subtitle {
    text-align: center;
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 60px;
  }

  .education-timeline {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
  }

  .education-timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #0077b6, #00b4d8);
    border-radius: 2px;
    transform: translateX(-50%);
  }

  .education-item {
    position: relative;
    margin-bottom: 50px;
    width: 100%;
  }

  .education-item:nth-child(odd) .education-card {
    margin-left: 0;
    margin-right: 55%;
  }

  .education-item:nth-child(even) .education-card {
    margin-left: 55%;
    margin-right: 0;
  }

  .education-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(0, 119, 182, 0.15);
    border: 1px solid rgba(0, 119, 182, 0.1);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
  }

  .education-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0, 119, 182, 0.05), transparent);
    transition: left 0.6s ease;
  }

  .education-card:hover::before {
    left: 100%;
  }

  .education-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 119, 182, 0.25);
    border-color: rgba(0, 119, 182, 0.3);
  }

  .education-icon {
    position: absolute;
    left: 50%;
    top: 30px;
    transform: translateX(-50%);
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(0, 119, 182, 0.3);
    z-index: 3;
    transition: all 0.3s ease;
  }

  .education-item:hover .education-icon {
    transform: translateX(-50%) scale(1.1) rotate(360deg);
  }

  .education-icon i {
    color: white;
    font-size: 1.5rem;
  }

  .education-year {
    display: inline-block;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 15px;
    box-shadow: 0 4px 15px rgba(0, 119, 182, 0.3);
  }

  .education-degree {
    font-size: 1.4rem;
    font-weight: 700;
    color: #0077b6;
    margin-bottom: 8px;
  }

  .education-institution {
    font-size: 1.1rem;
    color: #666;
    font-weight: 500;
    margin-bottom: 15px;
  }

  .education-description {
    color: #555;
    line-height: 1.6;
    margin-bottom: 15px;
  }

  .education-skills {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }

  .skill-tag {
    background: rgba(0, 180, 216, 0.1);
    color: #0077b6;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
    border: 1px solid rgba(0, 180, 216, 0.2);
    transition: all 0.3s ease;
  }

  .skill-tag:hover {
    background: rgba(0, 180, 216, 0.2);
    transform: translateY(-2px);
  }

  /* ========= FLOATING EDUCATION ICONS ========= */
  .floating-education {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
  }

  .floating-education-icon {
    position: absolute;
    width: 60px;
    height: 60px;
    background: rgba(0, 119, 182, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: floatEducation 18s ease-in-out infinite;
  }

  .floating-education-icon:nth-child(1) {
    top: 15%;
    left: 8%;
    animation-delay: 0s;
  }

  .floating-education-icon:nth-child(2) {
    top: 65%;
    right: 10%;
    animation-delay: 6s;
  }

  .floating-education-icon:nth-child(3) {
    bottom: 20%;
    left: 12%;
    animation-delay: 12s;
  }

  @keyframes floatEducation {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
      opacity: 0.3;
    }
    33% {
      transform: translateY(-35px) rotate(120deg);
      opacity: 0.6;
    }
    66% {
      transform: translateY(-50px) rotate(240deg);
      opacity: 0.3;
    }
  }

  /* ========= RESPONSIVE DESIGN ========= */
  @media (max-width: 768px) {
    .education-timeline::before {
      left: 30px;
    }

    .education-item:nth-child(odd) .education-card,
    .education-item:nth-child(even) .education-card {
      margin-left: 60px;
      margin-right: 0;
    }

    .education-icon {
      left: 30px;
      transform: translateX(-50%);
    }

    .education-title {
      font-size: 2.5rem;
    }

    .education-card {
      padding: 25px;
    }
  }
</style>
@endpush

<div class="education-wrapper">
  <!-- Floating Education Icons -->
  <div class="floating-education">
    <div class="floating-education-icon"><i class="fas fa-book"></i></div>
    <div class="floating-education-icon"><i class="fas fa-graduation-cap"></i></div>
    <div class="floating-education-icon"><i class="fas fa-university"></i></div>
  </div>

  <div class="fade-in-up">
    <h1 class="education-title">Education</h1>
    <p class="education-subtitle">My academic journey and learning experiences</p>
  </div>

  <div class="education-timeline">
    @forelse($educations as $education)
    <div class="education-item fade-in-up stagger-{{ $loop->index + 1 }} hover-lift">
      <div class="education-icon">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div class="education-card">
        <span class="education-year">{{ $education->year ?? '2020-2024' }}</span>
        <h3 class="education-degree">{{ $education->degree ?? 'Bachelor of Computer Science' }}</h3>
        <p class="education-institution">{{ $education->institution ?? 'University Name' }}</p>
        @if($education->description)
        <p class="education-description">{{ $education->description }}</p>
        @endif
        @if($education->subjects && count($education->subjects) > 0)
        <div class="education-skills">
          @foreach($education->subjects as $subject)
          <span class="skill-tag">{{ $subject }}</span>
          @endforeach
        </div>
        @endif
      </div>
    </div>
    @empty
    <!-- Default education items if no data -->
    <div class="education-item fade-in-up stagger-1 hover-lift">
      <div class="education-icon">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div class="education-card">
        <span class="education-year">2020-2024</span>
        <h3 class="education-degree">Bachelor of Computer Science</h3>
        <p class="education-institution">University of Technology</p>
        <p class="education-description">
          Comprehensive study of computer science fundamentals including programming, algorithms, 
          data structures, and software engineering principles.
        </p>
        <div class="education-skills">
          <span class="skill-tag">Programming</span>
          <span class="skill-tag">Data Structures</span>
          <span class="skill-tag">Algorithms</span>
          <span class="skill-tag">Software Engineering</span>
        </div>
      </div>
    </div>

    <div class="education-item fade-in-up stagger-2 hover-lift">
      <div class="education-icon">
        <i class="fas fa-school"></i>
      </div>
      <div class="education-card">
        <span class="education-year">2018-2020</span>
        <h3 class="education-degree">Higher Secondary Certificate</h3>
        <p class="education-institution">Science College</p>
        <p class="education-description">
          Focused on Science stream with Mathematics, Physics, Chemistry, and Computer Science.
        </p>
        <div class="education-skills">
          <span class="skill-tag">Mathematics</span>
          <span class="skill-tag">Physics</span>
          <span class="skill-tag">Chemistry</span>
          <span class="skill-tag">Computer Science</span>
        </div>
      </div>
    </div>

    <div class="education-item fade-in-up stagger-3 hover-lift">
      <div class="education-icon">
        <i class="fas fa-certificate"></i>
      </div>
      <div class="education-card">
        <span class="education-year">2023</span>
        <h3 class="education-degree">Web Development Certification</h3>
        <p class="education-institution">Online Learning Platform</p>
        <p class="education-description">
          Specialized certification in modern web development technologies and frameworks.
        </p>
        <div class="education-skills">
          <span class="skill-tag">HTML/CSS</span>
          <span class="skill-tag">JavaScript</span>
          <span class="skill-tag">Laravel</span>
          <span class="skill-tag">React</span>
        </div>
      </div>
    </div>
    @endforelse
  </div>
</div>
@endsection
