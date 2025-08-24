<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_info';

    protected $fillable = [
        'name',
        'title',
        'bio',
        'email',
        'phone',
        'location',
        'website',
        'github_url',
        'linkedin_url',
        'twitter_url',
        'instagram_url',
        'profile_image',
        'years_experience',
        'projects_completed',
        'happy_clients',
        'awards_won',
        'interests',
        'availability_status',
    ];

    protected $casts = [
        'interests' => 'array',
    ];
}
