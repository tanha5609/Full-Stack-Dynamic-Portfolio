<!DOCTYPE html>
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
    }

    .navbar a {
      margin-left: 15px;
      color: #222;
      text-decoration: none;
    }

    .navbar a:hover {
      text-decoration: underline;
      /* No background color change */
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