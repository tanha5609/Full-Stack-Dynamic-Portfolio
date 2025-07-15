<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tanha | Software Developer</title>
  <link rel="stylesheet" href="{{ asset('assest/css/style.css') }}">
  <style>
    /* ---------- EXPERIENCE SECTION ---------- */
    .experience-wrapper {
      max-width: 1100px;
      margin: 70px auto;
      padding: 0 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .experience-heading {
      text-align: center;
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 50px;
      color: #2c3e50;
    }

    .experience-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
    }

    .exp-card {
      background: rgba(255, 255, 255, 0.8);
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      padding: 30px 25px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-left: 5px solid #00bcd4;
    }

    .exp-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 16px 30px rgba(0, 0, 0, 0.12);
    }

    .exp-title {
      font-size: 22px;
      font-weight: 600;
      color: #34495e;
      margin-bottom: 8px;
    }

    .exp-org {
      font-size: 16px;
      color: #666;
      margin-bottom: 5px;
    }

    .exp-date {
      font-size: 13px;
      color: #aaa;
      margin-bottom: 15px;
    }

    .exp-desc {
      font-size: 15px;
      line-height: 1.6;
      color: #444;
    }

    @media (max-width: 600px) {
      .experience-heading {
        font-size: 28px;
      }
    }
  </style>
</head>

<body>
  <!-- HEADER (Unchanged) -->
  <header class="header">
    <div class="header-left" style="display: flex; flex-direction: column; align-items: flex-start;">
        <a href="{{ url('/') }}" class="name" style="text-decoration: none; color: inherit;">Tanha</a>
        <div class="role">Software Developer</div>
    </div>
    <nav class="navbar">
        <a href="{{ route('about') }}">About me</a>
        <a href="{{ route('education') }}">Education</a>
        <a href="{{ route('skills') }}">Skills</a>
        <a href="{{ route('projects') }}">Projects</a>
        <a href="{{ route('experience') }}">Experience</a>
    </nav>
  </header>

  <!-- EXPERIENCE SECTION -->
  <section class="experience-wrapper">
    <h2 class="experience-heading">Professional Experience</h2>

    <div class="experience-grid">

      <div class="exp-card">
        <div class="exp-title">Undergraduate Research Assistant</div>
        <div class="exp-org">Daffodil International University</div>
        <div class="exp-date">June 2023 – June 2024</div>
        <div class="exp-desc">Assisted in academic research focused on health tech and AI. Prepared datasets, built ML models, and co-authored a paper on Parkinson’s disease prediction.</div>
      </div>

      <div class="exp-card">
        <div class="exp-title">Internship Developer</div>
        <div class="exp-org">ABC Software Solutions</div>
        <div class="exp-date">Jan 2023 – Apr 2023</div>
        <div class="exp-desc">Contributed to the front-end of a task management app using Vue.js and Laravel. Actively participated in daily scrum and resolved multiple backend issues.</div>
      </div>

      <div class="exp-card">
        <div class="exp-title">Junior Software Developer</div>
        <div class="exp-org">TechNova Ltd.</div>
        <div class="exp-date">July 2024 – Present</div>
        <div class="exp-desc">Developed web apps using React and Node.js. Built APIs and handled deployment on AWS. Reviewed code and onboarded junior developers.</div>
      </div>

      <div class="exp-card">
        <div class="exp-title">Freelance Web Developer</div>
        <div class="exp-org">Remote</div>
        <div class="exp-date">2022 – Present</div>
        <div class="exp-desc">Built responsive websites for various clients using HTML/CSS, JavaScript, and Laravel. Focused on performance, SEO, and user-centered design.</div>
      </div>

    </div>
  </section>
</body>
</html>
