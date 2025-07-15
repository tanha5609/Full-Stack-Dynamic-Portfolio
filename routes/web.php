<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/education', function () {
    return view('education');
})->name('education');

Route::get('/skills', function () {
    return view('skills');
})->name('skills');

Route::get('/project', function () {
    return view('projects');
})->name('projects');

Route::get('/experience', function () {
    return view('experience');
})->name('experience');
