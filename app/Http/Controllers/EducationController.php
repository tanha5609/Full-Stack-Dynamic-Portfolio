<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function adminIndex()
    {
        $education = Education::orderBy('order')->get();
        return view('admin.education.index', compact('education'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'grade' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ]);

        Education::create($request->all());

        return redirect()->route('admin.education.index')->with('success', 'Education created successfully.');
    }

    public function show(Education $education)
    {
        return view('admin.education.show', compact('education'));
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'grade' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ]);

        $education->update($request->all());

        return redirect()->route('admin.education.index')->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.education.index')->with('success', 'Education deleted successfully.');
    }

    public function toggleStatus(Education $education)
    {
        $education->update(['is_active' => !$education->is_active]);
        return back()->with('success', 'Education status updated successfully.');
    }
}
