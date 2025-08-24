<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\UserInfo;

class PortfolioController extends Controller
{
    public function index()
    {
        $userInfo = UserInfo::first();
        return view('welcome', compact('userInfo'));
    }

    public function about()
    {
        $userInfo = UserInfo::first();
        $skillsCount = Skill::active()->count();
        $projectsCount = Project::active()->count();
        return view('about', compact('userInfo', 'skillsCount', 'projectsCount'));
    }

    public function skills()
    {
        $skills = Skill::active()->ordered()->get();
        return view('skills', compact('skills'));
    }

    public function education()
    {
        $educations = Education::active()->ordered()->get();
        return view('education', compact('educations'));
    }

    public function experience()
    {
        $experiences = Experience::active()->ordered()->get();
        return view('experience', compact('experiences'));
    }

    public function projects()
    {
        $projects = Project::active()->ordered()->get();
        return view('projects', compact('projects'));
    }
}
