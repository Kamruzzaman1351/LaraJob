<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\Apply\StoreApplyJobRequest;
use App\lib\FileUploader;
use App\Models\ApplyJob;

class JobApplyController extends Controller
{
    public function apply(Job $job) {
        abort_if($job->user_id == auth()->user()->id, 403, 'You are not allowed to apply this job');
        return view('apply.index', ['job' => $job]);
    }

    public function applyJob(StoreApplyJobRequest $request, Job $job) {
        $formData = $request->validated();
        if($request->hasFile('file_cv')) {
            $fileName = (new FileUploader)->fileName($request->file('file_cv'));
            $path = $request->file('file_cv')->storeAs('public/apply/cv', $fileName);
            $formData['file_cv'] = $fileName;
        }
        $formData['job_id'] = $job->id;
        $apply = new ApplyJob();
        $apply->forceFill($formData);
        $apply->save();
        return redirect("/jobs/$job->id")->with('message', "Application Complete");

    }
}
