<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tanha | Software Developer</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <header class="header">
    <div class="header-left" style="display: flex; flex-direction: column; align-items: flex-start;">
        <a href="{{ url('/') }}" class="name" style="text-decoration: none; color: inherit;">Tanha</a>
        <div class="role">Software Developer</div>
    </div>
    <nav class="navbar">
        <a href="{{ url('about') }}">About me</a>
        <a href="{{ url('education') }}">Education</a>
        <a href="{{ url('skills') }}">Skills</a>
        <a href="{{ url('project ') }}">project </a>
        <a href="{{ url('experience') }}">Experience</a>
    </nav>
    </header>

<style>
  .project -section{
    padding:50px 5%;
    background:#f9fafa;
  }
  .section-title{
    text-align:center;
    font-size:2rem;
    margin-bottom:40px;
    color:#0077b6;
  }
  
  .project-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:32px;
  }

  .project-card{
    background:#fff;
    border-radius:12px;
    box-shadow:0 4px 14px rgba(0,0,0,0.07);
    overflow:hidden;
    display:flex;
    flex-direction:column;
    transition:transform .2s ease;
  }
  .project-card:hover{transform:translateY(-6px)}

  .project-img{
    width:100%;
    height:160px;                 
    object-fit:cover;
  }
  .project-content{
    padding:18px;
    flex-grow:1;
    display:flex;
    flex-direction:column;
  }
  .project-title{
    font-size:1.25rem;            
    margin:0 0 8px;
    color:#222;
  }
  .project-desc{
    flex-grow:1;
    font-size:.9rem;
    color:#555;
    margin-bottom:10px;
    line-height:1.45;
  }
  .project-tags{
    margin-bottom:14px;
    font-size:.8rem;
  }
  .project-tags span{
    background:#e0f4ff;
    color:#0077b6;
    padding:4px 8px;
    border-radius:6px;
    margin-right:6px;
    display:inline-block;
    margin-bottom:4px;
  }
  .project-btn{
    align-self:flex-start;
    padding:6px 12px;
    background:#0077b6;
    color:#fff;
    border-radius:6px;
    text-decoration:none;
    font-size:.85rem;
    transition:background .2s;
  }
  .project-btn:hover{background:#005f94}
</style>
</header>

<main class="project -section">
  <h1 class="section-title">My project </h1>

  <div class="project-grid">

    
    <div class="project-card">
      <img src="https://i.ytimg.com/vi/TwYKwaEjJd4/maxresdefault.jpg" alt="Portfolio Website" class="project-img">
      <div class="project-content">
        <h2 class="project-title">Portfolio Website</h2>
        <p class="project-desc">A fully responsive personal portfolio built with HTML, CSS, and vanilla JavaScript to showcase my work and skills.</p>
        <div class="project-tags"><span>HTML</span><span>CSS</span><span>JavaScript</span></div>
        <a href="https://github.com/tanha5609/Full-Stack-Dynamic-Portfolio.git" class="project-btn" target="_blank">View Project</a>
      </div>
    </div>


    
    <div class="project-card">
      <img src="https://www.crawfordsq.com/wp-content/uploads/2020/05/On-The-Go-730x730.png" alt="On the GO" class="project-img">
      <div class="project-content">
        <h2 class="project-title">On&nbsp;the&nbsp;GO</h2>
        <p class="project-desc">A traffic-update social platform with live maps to help commuters plan smarter routes and share instant road alerts.</p>
        <div class="project-tags"><span>Flutter</span><span>Firebase</span></div>
        <a href="https://github.com/emtiaz1/on_the_go.git" class="project-btn" target="_blank">View Project</a>
      </div>
    </div>

    <div class="project-card">
      <img src="https://www.iedunote.com/img/1087/bank-management.jpg" alt="Bank Management System" class="project-img">
      <div class="project-content">
        <h2 class="project-title">Bank Management System</h2>
        <p class="project-desc">A console-based system to manage customer accounts, transactions, and reports — written from scratch.</p>
        <div class="project-tags"><span>C</span><span>C++</span><span>Console</span></div>
        <a href="#" class="project-btn" target="_blank">View Project</a>
      </div>
    </div>

    <div class="project-card">
      <img src="https://media.licdn.com/dms/image/v2/D4D0BAQEsgvw6MbhuyA/company-logo_200_200/company-logo_200_200/0/1719812547140/myeduguardian_logo?e=2147483647&v=beta&t=PorXlKZhBeDTzn1tEc4AQ_6zB9osAgtq3zJTyBPPtjE" alt="EduGourdian" class="project-img">
      <div class="project-content">
        <h2 class="project-title">EduGourdian</h2>
        <p class="project-desc">A teacher portal prototype that tracks student progress, attendance, and analytics — designed for intuitive use.</p>
        <div class="project-tags"><span>Figma</span><span>Canva</span></div>
        <a href="#" class="project-btn" target="_blank">View Project</a>
      </div>
    </div>

  </div>
</main>
</body>
</html>
