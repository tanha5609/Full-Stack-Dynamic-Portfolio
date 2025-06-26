<<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tanha | Software Developer</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <style>
    .navbar {
      display: flex;
      gap: 24px;
      align-items: center;
      margin-left: auto;
      text-align: right;
      margin-top: 10px;
      margin-bottom: 20px;
    }

    .navbar a {
      margin-left: 15px;
      color: #222;
      text-decoration: none;
      font-size: 16px;
      padding: 4px 8px;
    }

    .navbar a:hover {
      background: #f0f0f0;
      border-radius: 4px;
    }

    .edu-wrapper{
      padding:60px 5%;
      max-width:1100px;
      margin:auto;
      font-family:Arial,Helvetica,sans-serif;
      color:#333;
    }
    .edu-title{
      text-align:center;
      font-size:2rem;
      margin-bottom:60px;
      color:#0077b6;
    }


    .edu-timeline{
      list-style:none;
      margin:0;
      padding-left:30px;           
      border-left: 2px solid #2196f3;
    }
    .timeline-item{
      position:relative;
      margin-bottom:60px;
    }
    .icon-circle{
      position:absolute;
      left:-30px;
      top:0;
      width:46px;height:46px;
      border-radius:50%;
      background:#0077b6;color:#fff;
      display:flex;align-items:center;justify-content:center;
      font-size:1.3rem;
      box-shadow:0 4px 12px rgba(0,0,0,.12);
    }

    .card{
      background:#fff;
      border:1px solid #e5f1ff;
      border-radius:12px;
      overflow:hidden;
      box-shadow:0 4px 14px rgba(0,0,0,.06);
      transition:transform .25s,box-shadow .25s;
    }
    .card:hover{
      transform:translateY(-4px);
    p  box-shadow:0 8px 20px rgba(0,0,0,.09);
    }
    .edu-img{
      width:100%;
      height:280px;
      object-fit:cover;
    }
    .card > *{
      padding:0 24px;
    }
    .date-range{
      display:block;
      margin-top:18px;
      font-size:.85rem;
      color:#0077b6;
    }
    .inst-name{
      margin:6px 0 4px;
      font-size:1.25rem;
    }
    .degree{
      margin:0 0 10px;
      font-size:.95rem;
      color:#555;
    }
    .card p{
      margin:0 0 24px;
      line-height:1.5;
      font-size:.9rem;
    }
    .profile-pic {
      display: block;
      max-width: 100px;
      height: auto;
      border-radius: 50%;
      margin: 20px auto;
    }

    @media(max-width:768px){
      .edu-timeline{padding-left:20px;border-left-width:3px;}
      .icon-circle{width:38px;height:38px;font-size:1.1rem;left:-22px;}
      .edu-img{height:220px;}
      .inst-name{font-size:1.15rem;}
    }

    .timeline-line {
      display: none;
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="header-left" style="display: flex; flex-direction: column; align-items: flex-start;">
        <a href="{{ url('/') }}" class="name" style="text-decoration: none; color: inherit;">Tanha</a>
        <div class="role">Software Developer</div>
    </div>
    <nav class="navbar">
        <a href="{{ url('/about') }}">About me</a>
        <a href="{{ url('/education') }}">Education</a>
        <a href="{{ url('/skills') }}">Skills</a>
        <a href="{{ url('/projects') }}">Projects</a>
        <a href="{{ url('/experience') }}">Experience</a>
    </nav>
  </header>
    <style>

.edu-wrapper{
  padding:60px 5%;
  max-width:1100px;
  margin:auto;
  font-family:Arial,Helvetica,sans-serif;
  color:#333;
}
.edu-title{
  text-align:center;
  font-size:2rem;
  margin-bottom:60px;
  color:#0077b6;
}


.edu-timeline{
  list-style:none;
  margin:0;
  padding-left:30px;           
  border-left: 2px solid #2196f3;
}
.timeline-item{
  position:relative;
  margin-bottom:60px;
}
.icon-circle{
  position:absolute;
  left:-30px;
  top:0;
  width:46px;height:46px;
  border-radius:50%;
  background:#0077b6;color:#fff;
  display:flex;align-items:center;justify-content:center;
  font-size:1.3rem;
  box-shadow:0 4px 12px rgba(0,0,0,.12);
}

.card{
  background:#fff;
  border:1px solid #e5f1ff;
  border-radius:12px;
  overflow:hidden;
  box-shadow:0 4px 14px rgba(0,0,0,.06);
  transition:transform .25s,box-shadow .25s;
}
.card:hover{
  transform:translateY(-4px);
p  box-shadow:0 8px 20px rgba(0,0,0,.09);
}
.edu-img{
  width:100%;
  height:280px;
  object-fit:cover;
}
.card > *{
  padding:0 24px;
}
.date-range{
  display:block;
  margin-top:18px;
  font-size:.85rem;
  color:#0077b6;
}
.inst-name{
  margin:6px 0 4px;
  font-size:1.25rem;
}
.degree{
  margin:0 0 10px;
  font-size:.95rem;
  color:#555;
}
.card p{
  margin:0 0 24px;
  line-height:1.5;
  font-size:.9rem;
}
.profile-pic {
  display: block;
  max-width: 100px;
  height: auto;
  border-radius: 50%;
  margin: 20px auto;
}

@media(max-width:768px){
  .edu-timeline{padding-left:20px;border-left-width:3px;}
  .icon-circle{width:38px;height:38px;font-size:1.1rem;left:-22px;}
  .edu-img{height:220px;}
  .inst-name{font-size:1.15rem;}
}

.timeline-line {
  display: none;
}
</style>

  </header>

  <main class="edu-wrapper">
  <h1 class="edu-title">My Education Journey</h1>

  <ul class="edu-timeline">

    
    <li class="timeline-item">
      <div class="icon-circle">school</div>
      <div class="card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1b5pkcfhHynSfLBTVs0pjdWbgh4TlRQGv8w&s" alt="Sunrise High School" class="edu-img">
        <span class="date-range">2013 – 2018</span>
        <h3 class="inst-name">Sunrise High School</h3>
        <h4 class="degree">Secondary School Certificate (SSC)</h4>
        <p>Graduated with distinction, captained the coding club, and won inter-school science fairs.</p>
      </div>
    </li>

    
    <li class="timeline-item">
      <div class="icon-circle">college</div>
      <div class="card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuivd8QIQ88bACJxgDSs0BNPipd-0l1dKBdg&s" alt="Greenfield College" class="edu-img">
        <span class="date-range">2018 – 2020</span>
        <h3 class="inst-name">Greenfield College</h3>
        <h4 class="degree">Higher Secondary Certificate (HSC)</h4>
        <p>Focused on Physics–Math stream, achieved GPA 5.00, and built my first C++ robotics project.</p>
      </div>
    </li>

    
    <li class="timeline-item">
      <div class="icon-circle">varsity</div>
      <div class="card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHYFjdeFWLh-klBG29QD-CpZ9TNkXgloO6DQ&s" alt="ABC University" class="edu-img">
        <span class="date-range">2021 – 2025</span>
        <h3 class="inst-name">ABC University</h3>
        <h4 class="degree">B.Sc. in Computer Science &amp; Engineering</h4>
        <p>Specialised in software engineering and AI; capstone on traffic-jam prediction earned dean’s award.</p>
      </div>
    </li>

  </ul>
  <div class="timeline-line"></div>
</main>
<div class="education">
  <h3>Education</h3>
  <ul>
    <li>
      <strong>BSc in Computer Science</strong><br>
      XYZ University<br>
      2020 – 2024
    </li>
    <li>
      <strong>HSC</strong><br>
      ABC College<br>
      2018 – 2020
    </li>
  </ul>
</div>


