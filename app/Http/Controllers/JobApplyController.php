<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\Apply\StoreApplyJobRequest;

class JobApplyController extends Controller
{
    public function apply(Job $job) {
        abort_if($job->user_id == auth()->user()->id, 403, 'You are not allowed to apply this job');
        return view('apply.index', ['job' => $job]);
    }

    public function applyJob(StoreApplyJobRequest $request) {
        dd($request->all());
    }
}
