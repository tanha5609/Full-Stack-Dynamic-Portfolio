<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::active()->ordered()->get();
        return view('skills', compact('skills'));
    }

    public function adminIndex()
    {
        $skills = Skill::orderBy('order')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|url',
            'description' => 'required|string',
            'order' => 'integer|min:0',
        ]);

        Skill::create($request->all());

        return redirect()->route('admin.skills.index')->with('success', 'Skill created successfully.');
    }

    public function show(Skill $skill)
    {
        return view('admin.skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|url',
            'description' => 'required|string',
            'order' => 'integer|min:0',
        ]);

        $skill->update($request->all());

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }

    public function toggleStatus(Skill $skill)
    {
        $skill->update(['is_active' => !$skill->is_active]);
        return back()->with('success', 'Skill status updated successfully.');
    }
}
