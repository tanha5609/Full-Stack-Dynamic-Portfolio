<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tanha | Software Developer</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <style>
    <style>
    <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f5f8fa;
      color: #333;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 24px 48px 16px;
      border-bottom: 1px solid #eee;
      background: #fff;
    }

    .header-left {
      display: flex;
      flex-direction: column;
    }

    .name {
      font-size: 1.7rem;
      font-weight: bold;
      text-decoration: none;
      color: #222;
    }

    .role {
      font-size: 1rem;
      color: #888;
    }

    .navbar {
      display: flex;
      gap: 24px;
      flex-wrap: wrap;
      margin-top: 4px;
    }

    .navbar a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
    }

    .navbar a:hover {
      color: #0077b6;
    }

    .content {
      padding: 40px 5%;
    }

    .content h1 {
      text-align: center;
      margin-bottom: 40px;
      color: #0077b6;
    }

    .skills-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 32px;
      justify-content: center;
      align-items: flex-start;
    }

    .skill-card {
      width: 300px;
      background: #fff;
      border: 1px solid #e0e0e0;
      border-radius: 14px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      transition: 0.2s;
    }

    .card-header {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 20px;
      cursor: pointer;
    }

    .skill-img {
      width: 50px;
      height: 50px;
      background: #eee;
      border-radius: 8px;
      object-fit: contain;
    }

    .skill-title {
      flex-grow: 1;
      font-size: 1.2rem;
      font-weight: bold;
      color: #222;
    }

    .chevron {
      font-size: 1.1rem;
      transition: transform 0.3s;
    }

    .skill-desc {
      max-height: 0;
      overflow: hidden;
      padding: 0 20px;
      background: #f8f9fa;
      font-size: 0.95rem;
      color: #444;
      transition: max-height 0.3s ease, padding 0.3s ease;
    }

    .skill-card.open .skill-desc {
      padding: 16px 20px;
      max-height: 200px;
    }

    .skill-card.open .chevron {
      transform: rotate(180deg);
    }
  </style>
</head>
<body>

  <!-- ===== HEADER ===== -->
  <header class="header">
    <div class="header-left">
      <a href="{{ url('/') }}" class="name">Tanha</a>
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

    <main class="content">
    <h1>My Skills</h1>
    <div class="skills-cards" id="skills-container"></div>
  </main>

  <script>
    const skills = [
      {
        name: "HTML",
        img: "https://upload.wikimedia.org/wikipedia/commons/6/61/HTML5_logo_and_wordmark.svg",
        desc: "I have solid experience with HTML5, building semantic and accessible structures. I've been using it confidently for over 6 months."
      },
      {
        name: "CSS",
        img: "https://upload.wikimedia.org/wikipedia/commons/d/d5/CSS3_logo_and_wordmark.svg",
        desc: "From layouts to animations, I’ve worked with modern CSS including Flexbox and Grid. I can build beautiful responsive UIs."
      },
      {
        name: "JavaScript",
        img: "https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png",
        desc: "I’ve built interactive components using JavaScript. With 6+ months of practice, I’m confident in writing clean, dynamic code."
      },
      {
        name: "C",
        img: "https://upload.wikimedia.org/wikipedia/commons/3/35/The_C_Programming_Language_logo.svg",
        desc: "I started programming with C. I’ve solved hundreds of problems and understand core programming logic well."
      },
      {
        name: "C++",
        img: "https://upload.wikimedia.org/wikipedia/commons/1/18/ISO_C%2B%2B_Logo.svg",
        desc: "C++ has been my go-to for problem solving and algorithmic challenges. I have 1+ year of experience with it."
      },
      {
        name: "Python",
        img: "https://upload.wikimedia.org/wikipedia/commons/c/c3/Python-logo-notext.svg",
        desc: "Python is my favorite for scripting and machine learning. I’ve used it for data analysis, automation, and more."
      },
      {
        name: "Flutter",
        img: "https://upload.wikimedia.org/wikipedia/commons/1/17/Google-flutter-logo.png",
        desc: "I've built cross-platform mobile apps using Flutter. Its widget-based structure makes building UIs fun and fast."
      },
      {
        name: "MySQL",
        img: "https://upload.wikimedia.org/wikipedia/en/d/dd/MySQL_logo.svg",
        desc: "I’ve worked with MySQL databases for storing and retrieving app data. Comfortable writing complex queries and joins."
      },
      {
        name: "Java",
        img: "https://upload.wikimedia.org/wikipedia/en/3/30/Java_programming_language_logo.svg",
        desc: "I have a good foundation in OOP through Java. Built console-based apps and understand the Java ecosystem well."
      },
      {
        name: "Figma",
        img: "https://upload.wikimedia.org/wikipedia/commons/3/33/Figma-logo.svg",
        desc: "I’ve used Figma for designing modern web and app UIs. Comfortable with prototyping and component-based design."
      }
    ];

    const container = document.getElementById("skills-container");

    skills.forEach(skill => {
      const card = document.createElement("div");
      card.className = "skill-card";
      card.innerHTML = `
        <div class="card-header">
          <img src="${skill.img}" alt="${skill.name}" class="skill-img">
          <span class="skill-title">${skill.name}</span>
          <span class="chevron">&#9662;</span>
        </div>
        <div class="skill-desc">${skill.desc}</div>
      `;
      container.appendChild(card);
    });

    document.addEventListener("DOMContentLoaded", () => {
      const cards = document.querySelectorAll(".skill-card");

      cards.forEach(card => {
        const header = card.querySelector(".card-header");
        header.addEventListener("click", () => {
          const isOpen = card.classList.contains("open");

          // Close all cards
          document.querySelectorAll(".skill-card.open").forEach(c => {
            if (c !== card) c.classList.remove("open");
          });

          // Toggle clicked card
          card.classList.toggle("open", !isOpen);
        });
      });
    });
  </script>
</body>
</html>
