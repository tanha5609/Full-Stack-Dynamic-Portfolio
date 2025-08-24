<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function adminIndex()
    {
        $experiences = Experience::orderBy('order')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'employment_type' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'technologies' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        
        // Convert technologies string to array if provided
        if (!empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        } else {
            $data['technologies'] = null;
        }
        
        // Set default values
        if (!isset($data['order'])) {
            $data['order'] = 0;
        }
        if (!isset($data['is_active'])) {
            $data['is_active'] = true;
        }

        Experience::create($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience created successfully.');
    }

    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'employment_type' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'technologies' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        
        // Convert technologies string to array if provided
        if (!empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        } else {
            $data['technologies'] = null;
        }
        
        // Handle checkbox
        if (!isset($data['is_active'])) {
            $data['is_active'] = false;
        }

        $experience->update($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Experience deleted successfully.');
    }

    public function toggleStatus(Experience $experience)
    {
        $experience->update(['is_active' => !$experience->is_active]);
        return back()->with('success', 'Experience status updated successfully.');
    }
}
