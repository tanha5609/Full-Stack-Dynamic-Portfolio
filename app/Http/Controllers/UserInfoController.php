<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;

class UserInfoController extends Controller
{
    public function edit()
    {
        $userInfo = UserInfo::first();
        if (!$userInfo) {
            $userInfo = new UserInfo();
        }
        return view('admin.user-info.edit', compact('userInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'github_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'profile_image' => 'nullable|string',
            'years_experience' => 'nullable|integer|min:0',
            'projects_completed' => 'nullable|integer|min:0',
            'happy_clients' => 'nullable|integer|min:0',
            'awards_won' => 'nullable|integer|min:0',
            'interests' => 'nullable|string',
            'availability_status' => 'nullable|string',
        ]);

        $data = $request->all();
        
        // Convert interests string to array if provided
        if (!empty($data['interests'])) {
            $data['interests'] = array_map('trim', explode(',', $data['interests']));
        } else {
            $data['interests'] = null;
        }

        $userInfo = UserInfo::first();
        if ($userInfo) {
            $userInfo->update($data);
        } else {
            UserInfo::create($data);
        }

        return redirect()->route('admin.user-info.edit')->with('success', 'User info updated successfully.');
    }
}
