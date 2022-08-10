<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'email', 'hear_about', 'eng_profic', 'good_fit',
        'life_goal', 'ideal_job', 'hardest_thing', 'team_member',
        'working', 'current_salary', 'expected_salary', 'about_you', 'file_cv',
    ];
}
