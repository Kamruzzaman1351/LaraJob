<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobApplyController extends Controller
{
    public function apply(Job $job) {
        abort_if($job->user_id == auth()->user()->id, 403, 'You are not allowed to apply this job');
        return view('apply.index', ['job' => $job]);
    }
}
