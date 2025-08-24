<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function adminIndex()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'completion_date' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        
        // Convert technologies string to array if provided
        if (!empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        } else {
            $data['technologies'] = [];
        }
        
        // Set default values
        if (!isset($data['order'])) {
            $data['order'] = 0;
        }
        if (!isset($data['is_featured'])) {
            $data['is_featured'] = false;
        }
        if (!isset($data['is_active'])) {
            $data['is_active'] = true;
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'completion_date' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        
        // Convert technologies string to array if provided
        if (!empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        } else {
            $data['technologies'] = [];
        }
        
        // Handle checkboxes
        if (!isset($data['is_featured'])) {
            $data['is_featured'] = false;
        }
        if (!isset($data['is_active'])) {
            $data['is_active'] = false;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    public function toggleStatus(Project $project)
    {
        $project->update(['is_active' => !$project->is_active]);
        return back()->with('success', 'Project status updated successfully.');
    }

    public function toggleFeatured(Project $project)
    {
        $project->update(['is_featured' => !$project->is_featured]);
        return back()->with('success', 'Project featured status updated successfully.');
    }
}
