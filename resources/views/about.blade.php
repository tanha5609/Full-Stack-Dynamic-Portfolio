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
        <a href="{{ url('projects') }}">Projects</a>
        <a href="{{ url('experience') }}">Experience</a>
    </nav>

<style>

.about-wrapper{
  padding:60px 5%;
  max-width:1100px;
  margin:auto;
  font-family:Arial,Helvetica,sans-serif;
  color:#333;
}


.about-hero{
  display:flex;
  flex-wrap:wrap;
  gap:40px;
  align-items:center;
  margin-bottom:60px;
}
.about-photo img{
  width:320px;height:360px;object-fit:cover;
  border-radius:18px;box-shadow:0 6px 24px rgba(0,0,0,.12);
}
.about-content{flex:1 1 320px}
.about-content h1{font-size:2rem;margin:0 0 12px}
.highlight{color:#0077b6}
.tagline{font-size:1rem;font-weight:600;color:#555;margin-bottom:14px}
.about-content p{line-height:1.55;margin-bottom:22px}


.about-stats{display:flex;gap:32px;margin:24px 0}
.stat h3{margin:0;font-size:1.8rem;color:#0077b6}
.stat span{font-size:.85rem;color:#666}


.contact-card{
  border:1px solid #d0e8ff;
  background:#f0f8ff;
  padding:18px 22px;
  border-radius:10px;
  max-width:320px;
}
.contact-card h2{
  margin:0 0 10px;
  font-size:1.15rem;
  color:#0077b6;
}
.contact-card p{
  margin:4px 0;
  font-size:.92rem;
}
.contact-card a{color:#0077b6;text-decoration:none}

/* interests */
.subheading{
  text-align:center;font-size:1.6rem;margin-bottom:30px;color:#0077b6
}
.chips{
  display:flex;flex-wrap:wrap;gap:12px;justify-content:center
}
.chip{
  background:#e0f4ff;color:#0077b6;padding:6px 14px;
  border-radius:18px;font-size:.85rem;font-weight:600
}

/* responsive tweaks */
@media(max-width:768px){
  .about-photo img{width:100%;height:auto}
  .about-stats{flex-wrap:wrap;gap:20px}
  .contact-card{max-width:100%}
}
</style>

<!-- ============ SMALL JS FOR TOGGLE ============ -->


  </header>

 <main class="about-wrapper">

  <!-- ▸ Hero -->
  <section class="about-hero">
    <div class="about-photo">
      <!-- swap with a real photo -->
      <img src="https://media.istockphoto.com/id/1293763250/photo/cute-kitten-licking-glass-table-with-copy-space.jpg?s=612x612&w=0&k=20&c=JbHxMGlHpB3BwgQChCDLt-Iwbl2MYX-SS_f8oQa8RO0=" alt="Tanha – profile photo">
    </div>

    <div class="about-content">
      <h1>Hello, I’m <span class="highlight">Foujia Afrose Tanha</span></h1>
      <p class="tagline">Software Developer • Problem Solver • Lifelong Learner</p>

      <p>
        I build clean, scalable software that solves real-world problems and delights users.
        Over the past two years I’ve explored full-stack web, cross-platform mobile, and a dash
        of cloud automation. Whether it’s crafting pixel-perfect UIs in Flutter or optimizing
        back-end queries in MySQL, I love turning complex ideas into elegant, maintainable code.
        When I’m not coding, you’ll catch me sketching UI concepts, binge-reading tech blogs, or
        capturing urban photography on weekend walks.
      </p>

      <div class="about-stats">
        <div class="stat"><h3>2+</h3><span>Years&nbsp;Experience</span></div>
        <div class="stat"><h3>15</h3><span>Projects&nbsp;Delivered</span></div>
        <div class="stat"><h3>8</h3><span>Tech&nbsp;Stacks</span></div>
      </div>

      <!-- contact card -->
      <div class="contact-card">
        <h2>Contact Info</h2>
        <p><strong>Email:</strong> <a href="mailto:tanha@example.com">tanha@example.com</a></p>
        <p><strong>Phone:</strong> <a href="tel:+880123456789">+880&nbsp;123-456-789</a></p>
        <p><strong>LinkedIn:</strong> <a href="#" target="_blank">linkedin.com/in/tanha</a></p>
      </div>
    </div>
  </section>

  <!-- ▸ Beyond Code -->
  <section class="about-interests">
    <h2 class="subheading">Beyond Code</h2>
    <div class="chips">
      <span class="chip">Tech Blogging</span>
      <span class="chip">UI/UX Design</span>
      <span class="chip">Reading&nbsp;Sci-Fi</span>
      <span class="chip">Travel Photography</span>
      <span class="chip">Public Speaking</span>
      <span class="chip">Open-Source</span>
    </div>
  </section>

</main>

</body>
</html> 
