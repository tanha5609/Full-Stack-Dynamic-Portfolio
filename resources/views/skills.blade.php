@extends('layouts.app')

@section('content')
@push('styles')
<style>
  /* ========= SKILLS PAGE STYLES ========= */
  .skills-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px;
  }

  .skills-title {
    text-align: center;
    font-size: 3rem;
    font-weight: 700;
    color: #0077b6;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
  }

  .skills-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #0077b6, #00b4d8);
    border-radius: 2px;
  }

  .skills-subtitle {
    text-align: center;
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 60px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
  }

  .skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    margin-top: 40px;
  }

  .skill-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 8px 32px rgba(0, 119, 182, 0.1);
    border: 1px solid rgba(0, 119, 182, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    cursor: pointer;
  }

  .skill-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0, 119, 182, 0.05), transparent);
    transition: left 0.6s ease;
  }

  .skill-card:hover::before {
    left: 100%;
  }

  .skill-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 119, 182, 0.2);
    border-color: rgba(0, 119, 182, 0.3);
  }

  .skill-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    position: relative;
    z-index: 2;
  }

  .skill-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    box-shadow: 0 4px 15px rgba(0, 119, 182, 0.3);
    transition: all 0.3s ease;
  }

  .skill-card:hover .skill-icon {
    transform: rotate(360deg) scale(1.1);
  }

  .skill-icon img {
    width: 35px;
    height: 35px;
    object-fit: contain;
    filter: brightness(0) invert(1);
  }

  .skill-name {
    font-size: 1.4rem;
    font-weight: 700;
    color: #0077b6;
    margin: 0;
  }

  .skill-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    position: relative;
    z-index: 2;
  }

  .skill-level {
    position: relative;
    z-index: 2;
  }

  .skill-level-label {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #333;
  }

  .skill-progress {
    width: 100%;
    height: 8px;
    background: rgba(0, 119, 182, 0.1);
    border-radius: 10px;
    overflow: hidden;
    position: relative;
  }

  .skill-progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #0077b6, #00b4d8);
    border-radius: 10px;
    transition: width 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
  }

  .skill-progress-bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    animation: shimmer 2s infinite;
  }

  @keyframes shimmer {
    0% {
      left: -100%;
    }
    100% {
      left: 100%;
    }
  }

  .expand-btn {
    background: none;
    border: none;
    color: #0077b6;
    font-weight: 600;
    cursor: pointer;
    padding: 8px 0;
    margin-top: 15px;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;
  }

  .expand-btn:hover {
    color: #005f94;
    transform: translateX(5px);
  }

  .expand-btn i {
    transition: transform 0.3s ease;
  }

  .skill-card.expanded .expand-btn i {
    transform: rotate(180deg);
  }

  .skill-details {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease;
    position: relative;
    z-index: 2;
  }

  .skill-card.expanded .skill-details {
    max-height: 200px;
    margin-top: 15px;
  }

  .experience-badge {
    display: inline-block;
    background: linear-gradient(135deg, #0077b6, #00b4d8);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-top: 10px;
  }

  /* ========= FLOATING SKILL ICONS ========= */
  .floating-skills {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
  }

  .floating-skill-icon {
    position: absolute;
    width: 40px;
    height: 40px;
    background: rgba(0, 119, 182, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: floatSkill 8s ease-in-out infinite;
  }

  .floating-skill-icon:nth-child(1) {
    top: 20%;
    left: 5%;
    animation-delay: 0s;
  }

  .floating-skill-icon:nth-child(2) {
    top: 40%;
    right: 8%;
    animation-delay: 2s;
  }

  .floating-skill-icon:nth-child(3) {
    bottom: 30%;
    left: 10%;
    animation-delay: 4s;
  }

  .floating-skill-icon:nth-child(4) {
    top: 60%;
    right: 15%;
    animation-delay: 6s;
  }

  @keyframes floatSkill {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
      opacity: 0.3;
    }
    25% {
      transform: translateY(-15px) rotate(90deg);
      opacity: 0.6;
    }
    50% {
      transform: translateY(-25px) rotate(180deg);
      opacity: 0.3;
    }
    75% {
      transform: translateY(-15px) rotate(270deg);
      opacity: 0.6;
    }
  }

  /* ========= RESPONSIVE DESIGN ========= */
  @media (max-width: 768px) {
    .skills-title {
      font-size: 2.5rem;
    }

    .skills-grid {
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .skill-card {
      padding: 25px;
    }

    .skill-icon {
      width: 50px;
      height: 50px;
    }

    .skill-icon img {
      width: 30px;
      height: 30px;
    }
  }
</style>
@endpush

<div class="skills-wrapper">
  <!-- Floating Skill Icons -->
  <div class="floating-skills">
    <div class="floating-skill-icon"><i class="fab fa-html5"></i></div>
    <div class="floating-skill-icon"><i class="fab fa-css3-alt"></i></div>
    <div class="floating-skill-icon"><i class="fab fa-js"></i></div>
    <div class="floating-skill-icon"><i class="fab fa-php"></i></div>
  </div>

  <div class="fade-in-up">
    <h1 class="skills-title">My Skills</h1>
    <p class="skills-subtitle">Explore my technical expertise and professional capabilities that drive innovative solutions</p>
  </div>

  <div class="skills-grid">
    @forelse($skills as $index => $skill)
    <div class="skill-card fade-in-up stagger-{{ ($index % 6) + 1 }} hover-lift" onclick="toggleSkill(this)">
      <div class="skill-header">
        <div class="skill-icon">
          @if($skill->image_url)
            <img src="{{ $skill->image_url }}" alt="{{ $skill->name }}">
          @else
            <i class="fas fa-code"></i>
          @endif
        </div>
        <h3 class="skill-name">{{ $skill->name }}</h3>
      </div>
      
      <p class="skill-description">{{ $skill->description }}</p>
      
      @if($skill->proficiency_level)
      <div class="skill-level">
        <div class="skill-level-label">
          <span>Proficiency</span>
          <span>{{ $skill->proficiency_level }}%</span>
        </div>
        <div class="skill-progress">
          <div class="skill-progress-bar" data-width="{{ $skill->proficiency_level }}%"></div>
        </div>
      </div>
      @endif

      <button class="expand-btn">
        <span>Learn More</span>
        <i class="fas fa-chevron-down"></i>
      </button>

      <div class="skill-details">
        <div class="experience-badge">{{ $skill->experience_years ?? '6' }}+ months experience</div>
        <p style="margin-top: 10px; color: #666; font-size: 0.9rem;">
          Continuously improving and applying this skill in real-world projects to deliver high-quality solutions.
        </p>
      </div>
    </div>
    @empty
    <div class="skill-card fade-in-up">
      <div class="skill-header">
        <div class="skill-icon">
          <i class="fas fa-code"></i>
        </div>
        <h3 class="skill-name">No Skills Available</h3>
      </div>
      <p class="skill-description">Skills will be displayed here once added through the admin panel.</p>
    </div>
    @endforelse
  </div>
</div>

@push('scripts')
<script>
function toggleSkill(card) {
  card.classList.toggle('expanded');
}

// Animate progress bars when they come into view
const observeProgressBars = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const progressBar = entry.target;
      const width = progressBar.getAttribute('data-width');
      setTimeout(() => {
        progressBar.style.width = width;
      }, 300);
    }
  });
}, { threshold: 0.5 });

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.skill-progress-bar').forEach(bar => {
    bar.style.width = '0%';
    observeProgressBars.observe(bar);
  });
});
</script>
@endpush
@endsection
